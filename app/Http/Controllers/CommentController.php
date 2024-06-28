<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'forum_id' => 'required|exists:forums,id',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'forum_id' => $request->forum_id,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $request->forum_id)->with('success', 'Comment added successfully');
    }
}



