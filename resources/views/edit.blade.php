@extends('layouts/app')

@section('title')
Edit Post
@endsection

@section('content')
<form class='mt-5' method="post" action="{{url('posts/update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <label for="exampleFormControlInput1" class="form-label text-primary">Post Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title" value="{{old('title',$post->title)}}">
        @error('title'){{$message}}@enderror
    </div>
    <div class="mb-5">
        <label for="exampleFormControlTextarea1" class="form-label text-primary">Post Content</label>
        <textarea class="form-control" name="body" rows="3" placeholder="content">{{old('body',$post->body)}}</textarea>
        @error('body'){{$message}}@enderror
    </div>
    <div class="form-group mt-4">
        <span class='text-primary'>Select tags</span><br>
        @foreach($all_tags as $tag)
        @if(in_array($tag->name, $tags))
        <input type='checkbox' checked class='mr-2' name='tags[]' value='{{$tag->id}}'>{{$tag->name}}
        @else
        <input type='checkbox' class='mr-2' name='tags[]' value='{{$tag->id}}'>{{$tag->name}}
        @endif
        <span class='mr-4'></span>
        @endforeach
    </div>
    <div class="form-group mt-5">
        <span class='text-primary'>Select image to upload</span><br><br>
        <input type="file" name="image">
        @error('image'){{$message}}@enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3 mb-5">Update</button>
</form>
@endsection