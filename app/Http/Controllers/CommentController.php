<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $forumId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'forum_id' => $forumId,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.show', $forumId)->with('success', 'Comment added successfully');
    }
}


