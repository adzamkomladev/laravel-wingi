@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
                <img src="{{ $category->image }}" class="img-thumbnail" alt="{{ $category->name }}">
            </div>
            <div class="col-md-6">
                @livewire('sub-categories.index', ['category' => $category])
            </div>
        </div>
    </div>
@endsection
