@extends('layoutboot.master')

@section('title')
Product
@endsection

@section('content')
<a href="/transactions/create" class="btn btn-primary mb-3">Cashier</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Struck</th>
            <th scope="col">Total</th>
            <th scope="col">Member</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $key=>$item)
        <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $item->no_struck }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->member }}</td>
            <td>
                <a href="/transaction/{{ $item->id }}/edit" onclick="deleteData({{ $item->id }})" class="btn btn-warning">Edit</a>
                <a href="javascript:" onclick="deleteData({{ $item->id }})" class="btn btn-danger">Delete</a>
                <form action="/transaction/{{ $item->id }}" id="formdelete_{{ $item->id }}" method="post" class="d-none">
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
