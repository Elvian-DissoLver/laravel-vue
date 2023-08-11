@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}">
        <label>Price:</label>
        <input type="text" name="price" value="{{ $product->price }}">
        <button type="submit">Update Product</button>
    </form>
@endsection
