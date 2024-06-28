<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Catforum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $query = Forum::query();

        if ($request->filled('category')) {
            $query->where('catforum_id', $request->category);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }

        $forums = $query->with('user', 'catforum')->get();
        $catforums = Catforum::all();

        return view('forum.index', compact('forums', 'catforums'));
    }

    public function show($id)
    {
        $forum = Forum::with('comments.user')->findOrFail($id);
        return view('forum.show', compact('forum'));
    }

    public function create()
    {
        $catforums = Catforum::all();
        return view('forum.create', compact('catforums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'catforum_id' => 'required',
        ]);

        Forum::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
            'catforum_id' => $request->catforum_id,
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum created successfully');
    }
}