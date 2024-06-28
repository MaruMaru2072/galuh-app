<?php

namespace App\Http\Controllers;

use App\Models\Catforum;
use Illuminate\Http\Request;

class CatforumController extends Controller
{
    public function index()
    {
        $catforums = Catforum::all();
        return view('catforum.index', compact('catforums'));
    }

    public function create()
    {
        return view('catforum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:catforums|max:255',
        ]);

        Catforum::create([
            'name' => $request->name,
        ]);

        return redirect()->route('catforum.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $catforum = Catforum::findOrFail($id);
        return view('catforum.edit', compact('catforum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:catforums,name,'.$id,
        ]);

        $catforum = Catforum::findOrFail($id);
        $catforum->update([
            'name' => $request->name,
        ]);

        return redirect()->route('catforum.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $catforum = Catforum::findOrFail($id);
        $catforum->delete();

        return redirect()->route('catforum.index')->with('success', 'Category deleted successfully');
    }
}
