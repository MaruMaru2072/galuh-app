<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $forums = Forum::query();

        if ($request->has('search')) {
            $forums->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $forums->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if ($request->has('category')) {
            $forums->where('category', $request->category);
        }

        $forums = $forums->get();

        return view('forum.index', compact('forums'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'content' => 'required|string',
        ]);

        $forum = new Forum();
        $forum->title = $request->title;
        $forum->category = $request->category;
        $forum->content = $request->content;
        $forum->user_id = Auth::id();
        $forum->save();

        return redirect()->route('forum.index')->with('success', 'Forum created successfully');
    }
}
