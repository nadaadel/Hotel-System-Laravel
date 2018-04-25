
@extends('admin.index')

@section('content')
<a href={{ URL::to('rooms/create' )}} >
  <input type="button" class="btn btn-success" value='Create a New Room '/></a>
<br/>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table id="myTable" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Capacity</th>
                                <th>Price</th>
                                <th> Floor Name</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th >Action</th>
                                {{ csrf_field() }}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('rooms') }}',
        columns: [
            {data: 'number', name: 'number'},
            {data: 'capacity', name: 'capacity'},
            {data: 'price', name: 'price'},
            {data: 'floor.name', name: 'floor.name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'admin.name', name: 'admin.name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
    });
});
</script>
@endsection