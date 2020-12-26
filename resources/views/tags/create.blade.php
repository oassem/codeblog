@extends('layouts/app')

@section('title')
Create Tag
@endsection

@section('content')
<form class='mt-5' method="post" action="{{url('tags/store')}}">
    @csrf
    <div class="mb-2">
        <label class="form-label text-primary">Tag Name</label>
        <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
        @error('name'){{$message}}@enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Add</button>
</form>
@endsection