@extends('layoutboot.master')

@section('title')
Edit Product
@endsection

@section('content')
<a href="/products/create" class="btn btn-warning mb-3">Back</a>
<form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" value="{{ $product->price }}" name="price">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
