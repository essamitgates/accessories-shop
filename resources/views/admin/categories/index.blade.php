@extends('layouts.app')

@section('content')
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Add Category</a>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
