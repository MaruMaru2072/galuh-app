<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class StoreController extends Controller
{

    public function index(Request $request) {
        
        $items = Item::query();

        if ($request->has('search')) {
            $items->where('item_name', 'like', '%' . $request->search . '%');
        }

        $items = $items->get();

        return view('store.index', compact('items'));
    }

    public function create() {
        return view('store.create');
    }

    public function store(Request $request) {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|integer',
            'item_stock' => 'required|integer',
            'item_image_url' => 'required|string'
            // 'item_detail_id' => 'string'
        ]);

        Item::create([
            'item_name' => $request->item_name,
            'item_stock' => $request->item_stock,
            'item_price' => $request->item_price,
            'item_image_url' => $request->item_image_url,
        ]);

        return redirect()->route('store.index')->with('success', 'Item created successfully');
    }

    public function checkItemDetailView($request) {
        $item = Item::where('id', $request)->first();
        return view ('itemdetail', compact('item'));
    }

}
