<?php

namespace App\Http\Controllers;

use App\Models\Cartdetail;
use App\Models\Cartheader;
use App\Models\Historydetail;
use App\Models\Historyheader;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class HistoryController extends Controller
{
    //
    public function checkout() {

        \DB::transaction(function(){

            $chid = Cartheader::where('user_id', '=', Auth::user()->id)->first();
            $cartdetail = Cartdetail::where('cartheader_id', '=', $chid->id)->get();
            $totalprice = 0;
            foreach ($cartdetail as $cd) {
                $totalprice += $cd->qty * $cd->connectItem->price;
            }

//            MIDTRANS_CLIENTKEY="SB-Mid-client-8NRJkwsm9QBv_wa-"
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-CLL7GIchTq75GTxjN3S6eT9t';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $payload = [
                'transaction_details' => [
                    'order_id'      => $chid->id,
                    'gross_amount'  => $totalprice,
                ],
                'customer_details' => [
                    'first_name'    => Auth::user()->name,
                    'email'         => Auth::user()->email,
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($payload);

            $this-> response [
                'snap_token'
            ] = $snapToken;
        });
        $payment_url = 'https://app.sandbox.midtrans.com/snap/v2/vtweb/';
        $payment_url .= $this->response['snap_token'];

        return redirect($payment_url);
    }

    public function notificationHandler(Request $request)
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;
        $ch = Cartheader::findOrFail($orderId);

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

                if($fraud == 'challenge') {
                    $ch->setPending();
                } else {
                    $ch->setSuccess();
                }

            }

        } elseif ($transaction == 'settlement') {
            $ch->setSuccess();

        } elseif($transaction == 'pending'){
            $ch->setPending();

        } elseif ($transaction == 'deny') {
            $ch->setFailed();

        } elseif ($transaction == 'expire') {
            $ch->setExpired();

        } elseif ($transaction == 'cancel') {
            $ch->setFailed();

        }

    }

    public function createHistory () {
        $history = new Historyheader();
        $history->user_id = Auth::user()->id;
        $history->transactionDate = Carbon::now('WIB');
        $history->save();
        // $chid = CartHeader::find(Auth::user()->connectCartHeader->id);
        $chid = Cartheader::where('user_id', '=', Auth::user()->id)->first()->connectCartDetail;
        foreach ($chid as $cartdetail) {
            $historydetail = new Historydetail();
            $historydetail->item_id = $cartdetail->item_id;
            $historydetail->qty = $cartdetail->qty;
            $historydetail->historyheader_id = $history->id;
            $historydetail->save();
        }
        Cartdetail::where('cartheader_id', '=', Auth::user()->connectCartHeader->id)->delete();
        return redirect ('/storepage');
    }
    public function getHistory () {
        $q = Historyheader::where('user_id', '=', Auth::user()->id)->orderBy('transactionDate', 'desc')->get();
        return view ('store.history')->with(['historyheader'=>$q]);
    }
}
