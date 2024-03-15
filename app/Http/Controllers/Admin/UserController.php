<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cookie;

class UserController extends Controller
{
    //

    public function students()
    {
        $items = User::query()
            ->doesntHave('roles')->get();

        return view('dashboard.admin.users.index', compact('items'));

    }


    public function instructors()
    {
        $items = User::hasRole('instructor')
            ->get();

        return view('dashboard.admin.users.index', compact('items'));

    }

    public function loginAs(Request $request, $userId)
    {
        $this->setReLoginToken($request);

        Auth::loginUsingId($userId);

        return redirect('student/dashboard');
    }

    public function setReLoginToken($request)
    {
        $reLoginToken = md5(uniqid());

        $request->session()->put('reLoginToken', $reLoginToken);

        Cookie::queue('reLoginToken', $reLoginToken, 10);
    }
}
