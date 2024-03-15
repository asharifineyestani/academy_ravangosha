<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use function redirect;
use function view;


class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::user())
            return redirect('/student/dashboard');

        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('mobile', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/student/dashboard')
                ->withSuccess('خوش آمدید');
        }

        return redirect("login")->withErrors(['موبایل یا پسورد شما اشتباه بود']);
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('شما با موفقیت ثبت نام شدید');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }


}
