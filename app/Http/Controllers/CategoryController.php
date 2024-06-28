<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Productcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categorypage ($whichCategory) {
        $q = Item::all();
        $q3 = Productcategory::find($whichCategory);
        $q4 = Item::where('category_id', $whichCategory)->paginate(10);
        return view('store.category')->with(['items'=>$q,
        'category'=>$q3,
        'categoriedItems'=>$q4
    ]);
    }
    public function productdetail($whichItem){
        $q = Item::find($whichItem);
        $q2 = Productcategory::all();
        return view('store.itemdetail')->with(['items'=>$q, 'categories'=>$q2]);
    }

    public function managecategory() {
        $q = Productcategory::all();
        return view('store.categoryeditor')->with(['categories'=>$q]);
    }

    public function updatecategory(Request $request, $whichcategory) {
        $q = Productcategory::find($whichcategory);
        $q->name = $request->name;
        $q->save();
        $q2 = Productcategory::all();
        return redirect('/manageCategory')->with(['categories'=>$q])->with('success', 'Successfully edited category!');
    }

    public function createcategory(Request $request) {
        $q = new Productcategory();
        $q->name = $request->name;
        $q->save();
        return redirect('/manageCategory')->with('success', 'Successfully created category!');
    }

    public function deletecategory(Request $request, $whichcategory) {
        Productcategory::find($whichcategory)->delete();
        return redirect('/manageCategory')->with('success', 'Successfully deleted category!');
    }

}
