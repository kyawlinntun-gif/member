<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentInsertFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentInsertFormRequest $request)
    {
        $user_id = Auth::id();
        $commentable_type = 'App\Post';
        Comment::create(['content' => $request->get('content'), 'user_id' =>$user_id, 'commentable_id' => $request->get('commentable_id'), 'commentable_type' => $commentable_type]);

        return redirect()->back()->with('status', 'Comment was successfully created!');
    }
}
