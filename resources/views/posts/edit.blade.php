@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('put')

        <div class="field">
            <label for="title">Title</label>
            <input type="text" placeholder="Enter post title" id="title" name="title" class="inp" value="{{ $post->title }}" required>
            @error('title')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <label for="text">Text</label>
            <textarea placeholder="Enter post text" id="text" name="text" class="inp" required style="resize: vertical">{{ $post->text }}</textarea>
            @error('text')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Update" class="btn">
    </form>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/login.css') }}">
@endsection
