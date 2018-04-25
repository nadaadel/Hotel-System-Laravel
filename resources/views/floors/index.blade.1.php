@extends('admin.index')
@section('style')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<a href={{ URL::to('floors/create' )}} >
  <input type="button" class="btn btn-success" value='Create Floor '/></a>
<br/>
<table class="table table-hover table-dark">
    <tr>
      <th >#</th>
      <th >Floor Name</th>
      <th >Floor Number</th>
      <th >Created By</th>
      <th colspan="2">Actions</th>
    </tr>

@foreach($floors as $floor)
<tr>
      <td scope="row">{{$floor->id}}</td>
      <td>{{$floor->name}}</td>
      <td>{{$floor->number}}</td>
    <!-- if is Admin --><td> {{ $floor->Admin->name}} </td>
    <!-- if created by this Admin -->
      <td><a href={{ URL::to('/floors/edit/'. $floor->id ) }} type="button" class="btn btn-warning" >Edit</a></td>
 <td> 
   <form action="{{ URL::to('/floors/delete/'. $floor->id ) }}" onsubmit="return confirm('Do you really want to delete?');" method="post" ><input name="_method" value="delete" type="submit" class="btn btn-danger" />
    {!! csrf_field() !!}
    {{method_field('Delete')}}</form></td>

</tr>
@endforeach
</table>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Data Table Demo</div>

                <div class="panel-body">
                    <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('datatable/getdata') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
        ]
    });
});
</script>
@endsection
