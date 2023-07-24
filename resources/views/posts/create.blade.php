@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label for="title">Title</label>
            <input type="text" placeholder="Enter post title" id="title" name="title" class="inp" required>
            @error('title')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <label for="text">Text</label>
            <textarea placeholder="Enter post text" id="text" name="text" class="inp" required style="resize: vertical"></textarea>
            @error('text')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <label for="categories">Categories</label>
            <select id="categories" multiple="multiple" name="categories[]" class="js-example-basic-multiple">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('categories')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <label for="image">Image</label>
            <input type="file" placeholder="Enter post image" id="image" name="image" class="inp" required>
            @error('image')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Post" class="btn">
    </form>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/login.css') }}">
@endsection
