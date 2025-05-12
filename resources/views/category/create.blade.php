@extends('layout')
@section('title', 'Add Category')
@section('content-title', 'Add New Category')
@section('content')

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text @error('name') is-invalid @enderror" class="form-control" name="name" required value="{{ old('name')}}">
        @error('name')
                <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection
