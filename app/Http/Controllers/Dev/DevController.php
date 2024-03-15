<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\SmsLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevController extends Controller
{
    //

    public function sms()
    {

        return SmsLog::query()
            ->select('code','mobile')
            ->distinct()
            ->get();
    }


    public function deposit($amount)
    {
//        $ali =User::where('mobile','09128182951')->first();
//        $javad =User::where('mobile','09183636043')->first();
//        $zahra =User::where('mobile','09189872097')->first();
//
//        $ali->deposit(5000000, ['پنج میلیون اعتبار برای تست اپلیکیشن']);
//        $javad->deposit(5000000, ['پرداخت به صورت کارت به کارت']);
//        $zahra->deposit(750000, ['تسویه ۵ جلسه آموزش زبان به صورت حضوری تا تاریخ ۲۷ مرداد']);
//        $zahra->deposit(2400000, ['پیش پرداخت 16 جلسه کلاس زبان ماه شهریور']);
//
//        $javad->withdraw(2100000, ['سهم مهارتجو از ۲۱ ساعت آموزش حضوری تا تاریخ ۲۷ مرداد ']);
//        $zahra->withdraw(2100000, ['سهم مهارتجو از ۲۱ ساعت آموزش حضوری تا تاریخ  ۲۷ مرداد ']);
    }
}
