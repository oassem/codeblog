<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    function tags()
    {
        $tags = Tag::get();
        return view('tags', ['tags' => $tags]);
    }

    function create()
    {
        return view('tags/create');
    }

    function store(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required|max:50|min:3'
            ]
        );
        if ($validator->fails()) {
            return redirect('tags/create')->withErrors($validator)->withInput();
        }
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return redirect('tags');
    }

    function delete($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return redirect('tags');
    }

    function show($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->get();
        return view('tags/show', ['tag' => $tag, 'posts' => $posts]);
    }
}
