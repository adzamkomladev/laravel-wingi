@extends('layouts.auth')

@section('content')
    @livewire('auth.reset-password-card', ['user' => $user])
@endsection
