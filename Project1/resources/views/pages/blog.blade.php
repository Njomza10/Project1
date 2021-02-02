@extends('layouts.app')
@section('content')

    <h1>{{$title ?? ''}}</h1>

    @foreach($posts as $post)

        <div class="card" style="width:18rem;">
            <img class="card-img-top" src="{{$post->image}}" alt="card-image-cap">
            <div class="card-body">
                <small class="categories">{{$post->category->name ?? '-'}}</small>
                <h1 class="card-title">{{$post->title}}</h1>
                <p class="card-body">{{$post->body}}</p>
            </div>
        </div>
 
    @endforeach
@endsection
