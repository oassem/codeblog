@extends('layouts/app')

@section('title')
{{$tag->name}} Posts
@endsection

@section('content')
<div class='row mt-5'>
    @foreach($posts as $post)
    <div class='col-lg-4 mb-5'>
        <div class='item'>
            <div class="card" style="width: 18rem; height:40rem">
                <img src="<?php echo asset('images/' . $post->image) ?>" class="card-img-top" style="height:15rem">
                <div class="card-body">
                    <a href="{{url('posts/show',$post->id)}}">
                        <h5 class="card-title mt-3">{{$post->title}}</h5>
                    </a>
                    <p class="card-text" style="height:230px;">{{$post->body}}</p>
                </div>
                <a href="{{url('posts/edit',$post->id)}}" class="btn btn-secondary mx-3">Edit</a><br />
                <a href="{{url('posts/delete',$post->id)}}" class="btn btn-danger mx-3 mb-2">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection