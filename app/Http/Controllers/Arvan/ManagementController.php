<?php

namespace App\Http\Controllers\Arvan;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //
    public function videos(Request $request)
    {

        return view('management.videos.index', compact('request'));

    }

    public function courses(Request $request)
    {
        return view('management.courses.index', compact('request'));
    }


    public function editCourse($courseId)
    {
        $item = Course::query()->find($courseId);
        return view('management.courses.edit', compact('item'));
    }


    public function updateCourse(Request $request, $courseId)
    {
        $query = Course::query()->where('id', $courseId);
        $fields = $request->only([
            'price',
            'supported_price',
            'title',
            'excerpt',
            'body',
            'thumbnail_path',
            'prerequisites',
            'is_private',
            'status',
        ]);

        $query->update($fields);

        return back()->with('success','رکورد با موفقیت به روز رسانی شد');
    }
}
