<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //


    public function deposit(Request $request, $userId, $amount)
    {
        $meta = $request->meta;
        $user = User::find($userId);
        $transactionMeta = __('message.withdraw_from_admin', ['meta' => $meta]);
        $user->deposit($amount, [$transactionMeta]);
    }


    public function withdraw(Request $request, $userId, $amount)
    {
        $meta = $request->meta;
        $user = User::find($userId);
        $transactionMeta = __('message.withdraw_from_admin', ['meta' => $meta]);
        $user->withdraw($amount, [$transactionMeta]);
    }
}
