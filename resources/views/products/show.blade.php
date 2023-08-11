@extends('layouts.app')

@section('content')
    <h1>Product Detail</h1>
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
