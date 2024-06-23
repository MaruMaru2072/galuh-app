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
    public function createproduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'price' => 'numeric|required',
            'imageFile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('imageFile')) {
            $imageFile = $request->file('imageFile');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('imageitems'), $imageName); // move image to 'public/imageitems'

            // Create and save the new item
            $newitem = new Item();
            $newitem->name = $request->name;
            $newitem->category_id = $request->category;
            $newitem->detail = $request->detail;
            $newitem->price = $request->price;
            $newitem->photourl = '/imageitems/' . $imageName; // save the image path
            $newitem->save();

            return redirect('/manageProductPage')->with('success', 'Successfully added a new item!');
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }
    }
    
    public function updateproduct ($whichitem) {
        $categories = Category::all();
        $items = Item::find($whichitem);
        return view('store.producteditor', compact('categories', 'items'));
    }
    public function updatingproduct(Request $request, $idnya)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'price' => 'numeric|required',
            'imageFile' => 'mimes:png,jpeg,jpg|required'
        ]);

        $item = Item::find($idnya);
        if (!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        if ($request->hasFile('imageFile')) {
            $photoFile = $request->file('imageFile');
            $imageName = time() . '_' . $photoFile->getClientOriginalName();
            $photoFile->move(public_path('imageitems'), $imageName); // move image to 'public/imageitems'
            $item->photourl = '/imageitems/' . $imageName; // update the image path
        }

        $item->name = $request->name;
        $item->detail = $request->detail;
        $item->category_id = $request->category;
        $item->price = $request->price;
        $item->save();

        return redirect('/manageProductPage')->with('success', 'Successfully updated the item!');
    }
    
    public function deleteproduct ($whichitem) {
        Item::find($whichitem)->delete();
        return redirect('/manageProductPage');
    }
}
