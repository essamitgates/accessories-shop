<!-- resources/views/admin/products/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Add Product</a>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
