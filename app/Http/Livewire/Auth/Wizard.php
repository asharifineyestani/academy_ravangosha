<?php

namespace App\Http\Livewire\Auth;

use App\Http\Classes\WhiteSms;
use App\Models\SmsLog;
use App\Models\User;
use App\Sh4\sh4Auth;
use Auth;
use Cryptommer\Smsir\Classes\Smsir;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Livewire\Component;
use function env;
use function redirect;
use function session;
use function view;


class Wizard extends Component
{


    const STEPS = [
        'changePassword',
        'getCode',
        'getMobile',
        'getPassword',
        'getNewUserFields',
    ];

    const INIT_COUNT = 60;
    const MAX_COUNT_SMS_PER_DAY = 5;
    const Home_ROUTE_INSTRUCTOR = '/instructor/dashboard';
    const Home_ROUTE_ADMIN = '/admin/dashboard';
    const Home_ROUTE_STUDENT = '/student/dashboard';
    const DEFAULT_AVATAR = null;

    public $count = self::INIT_COUNT;

    protected $rules = [
        'mobile' => 'required|regex:/(09)[0-9]{9}/',
        'newPassword' => 'required | min:6',
        'confirmationPassword' => 'required | min:6|same:newPassword',
    ];


    public $step = 'getMobile';

    public $name = null;
    public $mobile = null;
    public $email = null;
    public $code = null;
    public $password = null;
    public $newPassword = null;
    public $confirmationPassword = null;
    public $forgotPassword = false;

    public $backUrl = null;


    public function mount(Request $request)
    {
        $this->backUrl = $request->get('backUrl');
    }


    public function back()
    {
        $this->forgotPassword = false;
        $this->changeStep('getMobile');
    }


    public function getCodeText($text = null)
    {
        $text_1 = 'حساب کاربری با شماره موبایل %s وجود ندارد. برای ساخت حساب جدید،کد تایید برای این شماره ارسال گردید.';
        $text_2 = 'کد یک بار مصرف برای  شماره موبایل  %s ارسال گردید.';
        $text_3 = 'برای احراز هویت شما کد تایید برای شماره موبایل %s ارسال گردید. بعد از این مرحله می توانید رمز جدید انتخاب نمایید ';

        if ($this->forgotPassword)
            $text = $text_3;
        elseif ($this->existUser())
            $text = $text_2;
        else
            $text = $text_1;

        return sprintf($text, $this->mobile);

    }


    public function backStep()
    {

    }


    public function validateCode()
    {

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {

                $log = SmsLog::query()
                    ->where('mobile', $this->mobile)
                    ->where('code', $this->code)
                    ->exists();


                $count = SmsLog::query()
                    ->where('mobile', $this->mobile)
                    ->whereDate('created_at', \Carbon\Carbon::today())
                    ->count();


                if (!$log && $count >= self::MAX_COUNT_SMS_PER_DAY) {
                    $msg = "کد وارد شده اشتباه است. \n ما میتوانیم برای شما روزانه فقط %s بار کد تایید بفرستیم. \n فردا می توانید دوباره امتحان کنید";
                    $formatMsg = sprintf($msg, self::MAX_COUNT_SMS_PER_DAY);
                    $validator->errors()->add('code', $formatMsg);
                } elseif (!$log) {
                    $validator->errors()->add('code', 'کد وارد شده اشتباه است');
                }


            });
        })->validateOnly('code');


    }


    public function validatePassword()
    {

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                $validator->errors()->add('password', 'پسورد اشتباه است');
            });
        })->validateOnly('password');


    }


    public function loginWithToken()
    {
        $this->sendCode();
        return $this->changeStep('getCode');
    }


    public function isValidCode()
    {

        $this->validateCode();


        if (!$this->existUser())
            return $this->changeStep('getNewUserFields');


        if ($this->forgotPassword)
            return $this->changeStep('changePassword');

        else
            $this->loginByMobile();


    }


    public function changePassword()
    {

        $this->validateOnly('newPassword',);
        $this->validateOnly('confirmationPassword',);


        if ($this->newPassword === null || $this->newPassword !== $this->confirmationPassword)
            return 0;


        User::where('mobile', $this->mobile)->update([
            'password' => Hash::make($this->newPassword)
        ]);

        return $this->loginByMobile();

    }


    public function forgotPassword()
    {
        $this->forgotPassword = true;
        $this->loginWithToken();
    }


    public function register()
    {
        User::create([
            'name' => $this->name,
            'mobile' => $this->mobile,
            'avatar_path' => self::DEFAULT_AVATAR,
        ]);


        return $this->loginByMobile();

    }


    public function resendCode()
    {
        $this->count = self::INIT_COUNT;

        $this->loginWithToken();
    }


    public function loginOrRegister()
    {


        $this->validateOnly('mobile');

        $existUser = User::where('mobile', $this->mobile)->exists();

        if ($existUser)
            return $this->changeStep('getPassword');
        else
            return $this->loginWithToken();


    }


    public function existUser()
    {
        return User::where('mobile', $this->mobile)->exists();
    }


    public function changeStep($step)
    {
        $this->step = $step;
    }


    public function loginByCode()
    {
        $canLogin = SmsLog::validFromLog($this->code, $this->mobile);

        if ($canLogin) {
            $this->redirectToDashboard();
        }

    }


    public function loginByPassword()
    {
        $condition = [
            'mobile' => $this->mobile,
            'password' => $this->password,
        ];


        if (Auth::attempt($condition)) {
            return $this->redirectToDashboard();
        }

        $this->validatePassword();


    }


    public function loginByMobile()
    {
        $user = User::where('mobile', $this->mobile)->first();

        if ($user)
            Auth::login($user);

        return $this->redirectToDashboard();
    }


    public function redirectToDashboard()
    {

        $previousUrl = session()->get('previousUrl');
        if ($previousUrl) {
            session()->forget('previousUrl');
            return redirect($previousUrl);
        }



        if ($this->backUrl)
            return redirect($this->backUrl);

        elseif (Auth::user()->hasRole('super-admin'))
            return redirect(self::Home_ROUTE_ADMIN);


        elseif (Auth::user()->hasRole('instructor'))
            return redirect(self::Home_ROUTE_INSTRUCTOR);


        return redirect(self::Home_ROUTE_STUDENT);
    }


    public function decrement()
    {
        --$this->count;
    }


    public function sendCode()
    {
        #set log on database

        $count = SmsLog::query()
            ->where('mobile', $this->mobile)
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->count();


        if ($count >= self::MAX_COUNT_SMS_PER_DAY)
            return null;


        $log = SmsLog::create([
            'mobile' => $this->mobile,
            'ip' => \Request::ip(),
            'code' => rand(1000, 9999),
        ]);


        #send sms

        $this->handleSendSms($log);

    }


    public function handleSendSms($log)
    {
        $sms = new WhiteSms();
        $sms->setMobile($log->mobile);
        $sms->setId(567415);
        $sms->setParam('CODE', $log->code);
        $sms->send();
    }


    public function render()
    {

        if (Auth::user())
            $this->redirectToDashboard();


        session()->flash('error', 'Post successfully updated.');

        return view('livewire.auth.wizard')
            ->extends('layouts.eduport.master_auth')
            ->section('main');
    }

}
