<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //
    public function show($id)
    {
        $course = Course::query()
            ->with(['topics', 'comments', 'faqs', 'tags'])
            ->where('id', $id)
            #important
            ->isPriced()
            ->first();


        if (!$course)
            abort(404);


        return view('public/courses/show', compact('course'));
    }

    public function index(Request $request)
    {

        $items = Course::limit(12)->with('videos');

        $items->where('title', 'like', '%' . $request->get('q') . '%');

        #important
        $items->isPriced();
//        $items->whereNotNull('channel_id');

        if ($request->get('noPrerequisite') == 1)
            $items->where('prerequisites', null);

        $items = $items->paginate(8);


        return view('public/courses/index', compact('items', 'request'));
    }

    public function video(Request $request, $courseId = null, $videoId)
    {


        $course = Course::query()
            ->where('id', $courseId)
            ->first();

        $video = Video::query()
            ->where('id', $videoId)
            ->first();


        return view('courses.video', compact('course', 'video', 'videoId', 'request'));
    }

    public function enroll($id, $supported = false)
    {
        if (Auth::guest())
            return redirect('login?backUrl=public/courses/' . $id);

        $user = \Auth::user();

        $course = Course::find($id);

        if ($supported) {
            $price = $course->calculated_supported_price;
        } else
            $price = $course->price;


        try {



            if ($supported){
                $user->withDraw($price, [__('message.withdraw_buy_supported_course', ['title' => $course->title])]);
                $user->courses()->attach($course, ['is_supported' => 1]);
            }


            else{
                $user->withDraw($price, [__('message.withdraw_buy_course', ['title' => $course->title])]);
                $user->courses()->attach($course, ['is_supported' => 0]);
            }



        } catch (\Exception $e) {


            $needToDeposit = (int)$price - (int)$user->balance;


            if ($e instanceof InsufficientFunds) {


                return redirect('/student/wallet?amount=' . $needToDeposit . '&backUrl=/public/courses/' . $course->id)->withErrors([
                    __('message.message_inefficient'),
                    __('message.price_is_amount', ['amount' => number_format($price)]),
                    __('message.need_to_deposit', ['amount' => number_format($needToDeposit)]),
                ]);
            }

            if ($e instanceof BalanceIsEmpty) {
                return redirect('/student/wallet?amount=' . $needToDeposit . '&backUrl=/public/courses/' . $course->id)->withErrors([
                    __('message.empty_wallet'),
                    __('message.price_is_amount', ['amount' => number_format($price)]),
                    __('message.need_to_deposit_passive'),
                ]);
            }
        }


        return redirect('/public/courses/' . $id);
    }


    public function enrollWithSupport($id)
    {
        return $this->enroll($id, true);
    }

    public function enrollDifference($id)
    {
        return $this->enroll($id, true);

    }
}
