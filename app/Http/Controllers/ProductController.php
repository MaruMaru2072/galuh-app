<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function navigateStore() {
        $q = Item::all();
        $q2 = Category::all();
        return view('store.index')->with(['items'=>$q, 'categories'=>$q2]);
    }
    public function manageproduct (Request $request) {
        if (!empty($request->searchadmin)) {
            $q = Item::where('name', 'like', "%$request->searchadmin%")->paginate(10);
        } else {
            $q = Item::paginate(10);
        };
        return view('store.productmanager')->with(['items'=>$q]);
    }
    public function addproduct () {
        $categories = Category::all();
        $items = null;
        return view('store.producteditor', compact('categories', 'items'));
    }
    public function productdetail($whichItem){
        $q = Item::find($whichItem);
        return view('store.itemdetail')->with(['items'=>$q]);
    }
    public function aftersearch(Request $request){
        $q = Item::where('name', 'like', "%$request->search%")->get();
        return view('store.search')->with(['q'=>$q, 'searched'=>$request]);
    }
    public function aftersearching(Request $request){
        $q = Item::where('name', 'like', "%$request->search%")->get();
        redirect('store.search')->with(['q'=>$q, 'searched'=>$request]);
    }
    public function productPage(){
        return view('store.search');
    }
    public function createproduct (Request $request) {
        $this->validate($request, [
            'name'=>'required',
            'category'=>'required',
            'detail'=>'required',
            'price'=>'numeric|required',
            'filenya'=>'mimes:png,jpeg,jpg|required'
        ]);
        $imageFile = $request->file('imageFile');
        Storage::putFile(
            storage_path('public/storage/images'.'/'.$imageFile->getClientOriginalName()),
            $imageFile
        );
        $newitem = new Item();
        $newitem->name = $request->name;
        $category = Category::find($request->category);
        $newitem->category_id = $category->id;
        $newitem->detail = $request->detail;
        $newitem->price = $request->price;
        $newitem->photourl = 'public/storage/images'.'/'.$imageFile->getClientOriginalName();
        $newitem->save();
        return redirect('/manageProductPage')->with('success', 'Successfully added a new item!');
    }
    public function updateproduct ($whichitem) {
        $categories = Category::all();
        $items = Item::find($whichitem);
        return view('store.producteditor', compact('categories', 'items'));
    }
    public function updatingproduct (Request $request, $idnya) {
        $this->validate($request, [
            'name'=>'required',
            'category'=>'required',
            'detail'=>'required',
            'price'=>'numeric|required',
            'filenya'=>'mimes:png,jpeg,jpg|required'
        ]);
        $filenya = $request->file('filenya');
        Storage::putFileAs('/public/images', $filenya, $filenya->getClientOriginalName());
        $item = Item::find($idnya);
        $item->update([
            'name'=>$request->name,
            'detail'=>$request->detail,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'photourl'=>'/storage/images'.'/'.$filenya->getClientOriginalName()
        ]);
        return redirect('/manageProductPage')->with('success', 'Successfully updated an item!');
    }
    public function deleteproduct ($whichitem) {
        Item::find($whichitem)->delete();
        return redirect('/manageProductPage');
    }
}
