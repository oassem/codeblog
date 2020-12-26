@extends('layouts/app')

@section('title')
List Of Tags
@endsection

@section('content')
<div class='row'>
    @foreach($tags as $tag)
    <div class='col-lg-4 mt-5'>
        <div class='item'>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="{{url('tags/show',$tag->id)}}">
                        <h5 class="card-title mt-3">#{{$tag->name}}</h5>
                    </a>
                    <a href="{{url('tags/delete',$tag->id)}}" class="btn btn-light mt-3">Remove</a><br />
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection