<?php

namespace App\Http\Controllers;

use App\Models\Cartdetail;
use App\Models\Cartheader;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function cart () {
        $chid = Cartheader::where('user_id', '=', Auth::user()->id)->first();
        $cartdetail = Cartdetail::where('cartheader_id', '=', $chid->id)->get();
        $totalprice = 0;
        foreach ($cartdetail as $cd) {
            $totalprice += $cd->qty * $cd->connectItem->price;
        }
        return view('store.cart')->with(['cartdetail'=>$cartdetail, 'totalPrice'=>$totalprice]);
    }
    
    public function processPayment(Request $request) {
        $request->validate([
            'nonce' => 'required|string',
        ]);

        $nonce = $request->input('nonce');

        $client = new SquareClient([
            'accessToken' => config('services.square.access_token'),
            'environment' => 'sandbox',
        ]);

        $paymentsApi = $client->getPaymentsApi();

        $money = new \Square\Models\Money();
        $money->setAmount(100);
        $money->setCurrency('IDR');

        $createPaymentRequest = new CreatePaymentRequest($nonce, uniqid(), $money);

        try {
            $response = $paymentsApi->createPayment($createPaymentRequest);

            if ($response->isSuccess()) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Payment failed']);
            }
        } catch (ApiException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function purchaseitem (Request $request) {
        $this->validate($request, [
            'quantity'=>'numeric|required'
        ]);
        $chid = Cartheader::where('user_id', '=', Auth::user()->id)->first();
        $cart = Cartdetail::where('cartheader_id', '=', $chid->id)->where('item_id', '=', $request->itemid)->get();
        if (count($cart)==0){
            $cart = new Cartdetail();
            $cart->cartheader_id = $chid->id;
            $cart->item_id = $request->itemid;
            $cart->qty = $request->quantity;
            $cart->save();
        } else {
            $cart[0]->qty += $request->quantity;
            $cart[0]->save();
        }
        return redirect('/cartPage');
    }
    public function deleteitemincart ($whichItem) {
        CartDetail::find($whichItem)->delete();
        return redirect('/cartPage');
    }
}
