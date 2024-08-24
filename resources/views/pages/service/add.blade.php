@extends('layoutboot.master')

@section('css')

@endsection

@section('title')
Service
@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>This is a service page</h1>

            <a href="/service" class="btn btn-warning mb-3">Back</a>

            <form action="/service" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</div>

@endsection
