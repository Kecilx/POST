@extends('layout')
@section('title', 'Edit Category')
@section('content-title', 'Edit Category')
@section('content')

<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
