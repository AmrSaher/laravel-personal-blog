@extends('layouts.app')

@section('content')
    <div class="card">
        <img src="{{ str_contains($post->image_path, 'posts') ? URL::asset('storage/' . $post->image_path) : $post->image_path }}" class="card-img" alt="post image">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-paragraph">{{ $post->text }}</p>
            <span class="card-date">{{ $post->created_at->diffForHumans() }}</span>
            @auth
                <form style="display: none" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" id="delete-post-form">@csrf @method('delete')</form>
                <a href="#" onclick="if (confirm('Are you sure?')) document.getElementById('delete-post-form').submit()">Delete</a>
                <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
            @endauth
        </div>
    </div>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/posts/show.css') }}">
@endsection
