@extends('layouts/app')

@section('title')
{{$post->title}}
@endsection

@section('content')
<div class="card my-5" style="width: 20rem;">
    <img src="<?php echo asset('images/' . $post->image) ?>" class="card-img-top" style="height:250px;">
    <div class="card-body">
        <h5 class="card-title mt-3">{{$post->title}}</h5>
        <p class="card-text" style="height:230px;">{{$post->body}}</p>
    </div>
</div>
@endsection