<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categorypage ($whichCategory) {
        $q = Item::all();
        $q3 = Category::find($whichCategory);
        $q4 = Item::where('category_id', $whichCategory)->paginate(10);
        return view('store.category')->with(['items'=>$q,
        'category'=>$q3,
        'categoriedItems'=>$q4
    ]);
    }
    public function productdetail($whichItem){
        $q = Item::find($whichItem);
        $q2 = Category::all();
        return view('store.itemdetail')->with(['items'=>$q, 'categories'=>$q2]);
    }
}
