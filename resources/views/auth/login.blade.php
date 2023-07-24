@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="field">
            <label for="email">Email Address</label>
            <input type="email" placeholder="Enter your email address" name="email" class="inp" required>
            @error('email')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" placeholder="Enter your password" name="password" class="inp" required>
            @error('password')
                <span style="color: red; font-size: 15px">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" value="Login" class="btn">
    </form>
@endsection

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/login.css') }}">
@endsection
