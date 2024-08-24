@extends('layoutboot.master')

@section('title')
Product
@endsection

@section('content')
<a href="/products/create" class="btn btn-primary mb-3">Create</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Proce</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key=>$item)
        <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <a href="/products/{{ $item->id }}/edit" onclick="deleteData({{ $item->id }})" class="btn btn-warning">Edit</a>
                <a href="javascript:" onclick="deleteData({{ $item->id }})" class="btn btn-danger">Delete</a>
                <form action="/products/{{ $item->id }}" id="formdelete_{{ $item->id }}" method="post" class="d-none">
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


@section('js')
<script>
    function deleteData(id){
        if(confirm('Are you sure?')){
            return document.getElementById('formdelete_'+id).submit();
        }
        return false;
    }
</script>
@endsection
