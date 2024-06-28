<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'forum_id' => $forum->id,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $forum)->with('success', 'Comment added successfully.');
    }
}



