<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Item;

class CartController extends Controller
{

    public function index(Request $request) {
        $order = Order::query();

        $order = $order->get();

        return view('cart.index', compact('order'));
    }

    public function create() {
        return view('store.create');
    }

    public function createCart(Request $request) {

        Order::create([
            'item_id' => $request->item_id,
            'account_email' => Auth::user()->email,
            'price' => $request->item_price,
            'isBought' => false,
        ]);

        return redirect('/cart');

    }

}
