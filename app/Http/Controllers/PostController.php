<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function posts()
    {
        $posts = Post::get();
        return view('posts', ['posts' => $posts]);
    }

    function show($id)
    {
        $post = Post::find($id);
        return view('show', [
            'post' => $post
        ]);
    }

    function search(Request $request)
    {
        $posts = Post::get();
        return view('search', [
            'request' => $request,
            'posts' => $posts
        ]);
    }

    function latest(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->take($request->latest)->get();
        return view('latest', [
            'posts' => $posts
        ]);
    }
}
