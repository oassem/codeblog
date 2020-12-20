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
        $posts = Post::where('title', 'like', '%' . $request->search . '%')->orWhere('body', 'like', '%' . $request->search . '%')->get();
        return view('search', [
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

    function create()
    {
        return view('create');
    }

    function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|max:50|min:3',
                'body' => 'required|max:500|min:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect('posts/create')->withErrors($validator)->withInput();
        }
        $img = $request->file('image');
        $img->move(base_path('public\images'), $img->getClientOriginalName());
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $img->getClientOriginalName();
        $post->save();
        return redirect('posts');
    }

    function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts');
    }

    function edit($id)
    {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    function update($id, Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required|max:50|min:3',
                'body' => 'required|max:500|min:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );
        if ($validator->fails()) {
            return redirect('posts/edit/' . $id)->withErrors($validator)->withInput();
        }
        $img = $request->file('image');
        $img->move(base_path('public\images'), $img->getClientOriginalName());
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $img->getClientOriginalName();
        $post->save();
        return redirect('posts');
    }
}
