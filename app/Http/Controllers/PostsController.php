<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }

    public function getPosts() {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('templates.posts', compact('posts'));
    }
}
