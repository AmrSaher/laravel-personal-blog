@extends('layouts.app')

@section('content')
    <div class="cards">
        @foreach($posts as $post)
            @include('includes.post', ['post' => $post])
        @endforeach
    </div>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/posts/index.css') }}">
@endsection
