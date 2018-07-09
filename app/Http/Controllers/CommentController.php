<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        $comments = Comment::with('comments')
        ->whereNull('comment_id')
        ->get();
        
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            'name' => $request->get('name'),
            'comment' => $request->get('comment'),
            'comment_id' => $request->get('comment_id'),
        ]);
        
        return response()->json($comment);
    }
}
