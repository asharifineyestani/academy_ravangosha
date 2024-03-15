<?php

namespace App\Http\Controllers;

use App\Models\ShetabTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class PaymentController extends Controller
{

    public $shetabTransaction;
    public $amount;
    public $backUrl;

    const MESSAGE_DEPOSIT = 'افزایش موجودی از طریق دروازه پرداخت';


    public function handlePay(Request $request)
    {

        $this->amount = $request->get('amount');
        $this->backUrl = $request->get('backUrl');

        $invoice = (new Invoice)->amount($this->amount);


        return Payment::purchase($invoice, function ($driver, $transactionId) {
            $this->storeShetabTransaction($transactionId);
        })->pay()->render();


    }


    public function storeShetabTransaction($transactionId, $status = "INIT")
    {
        ShetabTransaction::create([
            'amount' => $this->amount,
            'transactionId' => $transactionId,
            'status' => $status,
            'back_url' => $this->backUrl,
            'driver' => 'ZARINPAL',
            'details' => null,
        ]);
    }


    public function updateShetabTransaction($transactionId, $status)
    {
        ShetabTransaction::query()
            ->where('transactionId', $transactionId)
            ->update([
                'status' => $status,
            ]);
    }


    public function callback(Request $request)
    {

        $status = $request->get('Status');
        $transactionId = $request->get('Authority');


        $this->updateShetabTransaction($transactionId, $status);


        try {
            $shetabTransaction = ShetabTransaction::query()->where('transactionId', $transactionId)->first();

            $amount = $shetabTransaction->amount;

            Payment::amount($amount)->transactionId($transactionId)->verify();


            return $this->deposit($shetabTransaction);


        } catch (InvalidPaymentException $exception) {

//            echo $exception->getMessage();

            return view('payments.nok');


        }


    }


    public function deposit($shetabTransaction)
    {

        Auth::user()->deposit($shetabTransaction->amount, [self::MESSAGE_DEPOSIT]);


        return redirect(getRedirectPathAfterPayment())->with([
            'success' => 'افزایش موجودی با موفقیت انجام شد',
            'backUrl' => $shetabTransaction->back_url,
        ]);

    }


}
