<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard.index');
        }

        return redirect("login")->withSuccess('به پنل کاربری خود خوش آمدید');
    }

    public function courses()
    {
        return view('dashboard.courses');
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $fields = $request->only([
            'name',
            'mobile',
            'email',
        ]);


        Auth::user()->update($fields);

        return back()->withSuccess('تغییرات با موففیت ثبت شد');
    }

    public function password()
    {
        return view('dashboard.password');
    }

    public function changePassword(Request $request)
    {

        $rules = [
            'old_password' => ['required', 'min:4', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, \Auth::user()->password)) {
                    return $fail(__('پسورد فعلی اشتباه است'));
                }
            }],
            'new_password' => 'required|min:4|same:password_confirmation|different:old_password',
            'password_confirmation' => 'required|min:4',
        ];


        $validator = \Validator::make($request->only(['old_password', 'new_password', 'password_confirmation']), $rules);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator);
        }


        $fields['password'] = bcrypt($request->get('new_password'));

        \Auth::user()->update($fields);

        return back()->with('success', 'پسورد با موفقیت تغییر یافت');


    }

    public function transactions()
    {
        return view('dashboard.transactions');
    }

    public function wallet(Request $request)
    {
        return view('dashboard.wallet')
            ->with('amount', $request->get('amount'))
            ->with('backUrl', $request->get('backUrl'));
    }


}
