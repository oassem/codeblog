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
}
