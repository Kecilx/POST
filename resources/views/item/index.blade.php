@extends('layout')
@section('title', 'item')
@section('content-title', 'item')
@section('content')

    {{-- Alert Section --}}
    @if (session('error'))
    <div class="alert alert-danger" id="alert-message">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success" id="alert-message">
        {{ session('success') }}
    </div>
    @endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Item</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('item.create') }}" class="btn btn-primary mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    {{-- JavaScript untuk auto hide alert --}}
    <script>
        setTimeout(function () {
            const alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease-out";
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
        </script>

@endsection
