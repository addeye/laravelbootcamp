@extends('layoutboot.master')

@section('title')
Transaction
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="/cart-insert" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Product</label>
                        <select name="product_id" id="product_id" class="form-select">
                            <option value="">-- Select Product --</option>
                            @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Quantity</label>
                        <input type="text" name="qty" id="qty" class="form-control">
                    </div>
                    <button class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ number_format($item->total) }}</td>
                            <td><a href="/cart-delete/{{ $item->id }}">Delete</a></td>
                        @endforeach
                    </tbody>
                </table>
                <a href="/cart-destroy" class="btn btn-danger">Destroy</a>
                <button type="button">Update</button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="/transactions" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Total</label>
                        <h4>{{ number_format(Cart::subtotal()) }}</h4>
                    </div>
                    <div class="mb-3">
                        <label for="">Grand Total</label>
                        <h4>{{ Cart::total(); }}</h4>
                    </div>
                    <div class="mb-3">
                        <label for="">Pay</label>
                        <input type="text" name="pay" id="pay" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Process</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
