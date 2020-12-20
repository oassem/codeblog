@extends('layouts/app')

@section('title')
Create Post
@endsection

@section('content')
<form class='mt-5' method="post" action="{{url('posts/store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <label for="exampleFormControlInput1" class="form-label text-primary">Post Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title" value="{{old('title')}}">
        @error('title'){{$message}}@enderror
    </div>
    <div class="mb-5">
        <label for="exampleFormControlTextarea1" class="form-label text-primary">Post Content</label>
        <input type="text" name="body" class="form-control" id="exampleFormControlInput1" placeholder="content" value="{{old('body')}}">
        @error('body'){{$message}}@enderror
    </div>
    <div class="form-group mt-4">
        <span class='text-primary'>Select image to upload</span><br><br>
        <input type="file" name="image">
        @error('image'){{$message}}@enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add</button>
</form>
@endsection