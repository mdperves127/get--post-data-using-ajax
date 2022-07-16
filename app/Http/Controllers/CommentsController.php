<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comments = Comment::where('post_id', $id)->orderBy('id', 'desc')->get();
        return view('templates.comments', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id) {
        $request->validate([
            'comment' => 'required|max:500'
        ], [
            'comment.required' => 'Please give your comment!'
        ]);
        $comments = Comment::create([
            'comment' => $request->comment,
            'post_id' => $id
        ]);
        return $comments;
    }
}
