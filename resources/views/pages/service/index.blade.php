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

            <a href="/service/create" class="btn btn-primary mb-3">Create</a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($services as $key=>$item)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="/service/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/service/{{ $item->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                            <button type="submit" class="btn btn-danger">Delete</button">
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


@section('js')
<script>
    // alert('hello');
</script>
@endsection
