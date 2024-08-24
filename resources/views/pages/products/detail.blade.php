@extends('layoutboot.master')

@section('title')
Detail Product
@endsection

@section('content')
<a href="/products/create" class="btn btn-warning mb-3">Back</a>
<table class="table table-hover table-striped">
    <tbody>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th scope="row">Price</th>
            <td>{{ $product->price }}</td>
        </tr>
    </tbody>
</table>
@endsection
