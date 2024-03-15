<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmsLog;
use Illuminate\Http\Request;

class SmsLogController extends Controller
{
    //

    public function sms()
    {

        $items =  SmsLog::query()
            ->select('code','mobile')
            ->distinct()
            ->get();
    }
}
