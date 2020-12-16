@extends('layouts/app')

@section('title')
Searched Posts
@endsection

@section('content')
<div class='row mt-5'>
    @foreach($posts as $post)
    @if(str_contains($post->title, $request->search) or str_contains($post->body, $request->search))
    <div class='col-lg-4'>
        <div class='item'>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo asset('images/' . $post->image) ?>" class="card-img-top" style="height:250px;">
                <div class="card-body">
                    <h5 class="card-title mt-3">{{$post->title}}</h5>
                    <p class="card-text" style="height:230px;">{{$post->body}}</p>
                    <a href="{{url('posts/show',$post->id)}}" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection