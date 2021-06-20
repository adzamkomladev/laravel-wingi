@extends('layouts.auth')

@section('content')

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <h3>Login</h3>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email address">
            @error('email')
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

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

@endsection
