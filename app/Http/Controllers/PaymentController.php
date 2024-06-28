<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout() {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create ([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'idr',
                    'product_data' => [
                        'name' => 'testes',
                    ],
                    'unit_amount' => 20000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('/afterPurchase'),
            'cancel_url' => route('/viewCarts'),
        ]);
        return redirect()->away($session->url);
    }
}
