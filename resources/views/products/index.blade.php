@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->price }}</li>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        @endforeach
    </ul>
@endsection
