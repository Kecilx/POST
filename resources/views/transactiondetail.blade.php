@extends('layout')
@section('title', 'History Transaction')
@section('content-title', 'History Transaction')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Transaction Detail</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('detail.create') }}" class="btn btn-primary mb-3">Add New Item</a>
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item_id</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactiondetails as $index => $transactiondetail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transactiondetail->item_id}}</td>
                        <td>{{ $transactiondetail->qty}}</td>
                        <td>{{ $transactiondetail->subtotal}}</td>
                        <td>
                            <a href="{{ route('detail.edit', $transactiondetail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('detail.destroy', $transactiondetail->id) }}" method="POST" style="display:inline;">
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
@endsection
