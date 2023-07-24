@extends('layouts.app')

@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="field">
            <label for="title">Title</label>
            <input type="text" placeholder="Enter category title" id="title" name="title" class="inp" required>
            @error('title')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Create" class="btn">
    </form>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/login.css') }}">
@endsection
