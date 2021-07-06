@extends('layouts.auth')

@section('content')

    {{-- <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <h3>Register</h3>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone number</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email address">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class=" form-control" name="password" id="password" placeholder="Your Password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
        <a class="link" href="{{ route('auth.login.show') }}">Login instead?</a> --}}

@endsection
