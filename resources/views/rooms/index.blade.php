
@extends('admin.index')

@section('content')
<head>    <meta name="_token" content="{{csrf_token()}}" />
</head>
<a href={{ URL::to('rooms/create' )}} >
  <input type="button" class="btn btn-success" value='Create a New Room '/></a>
<br/>
<span id='my-role' role="{{Auth::guard('admin')->user()->getRoleNames()->first()}}"></span>
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
                                <th>Price in Dollar</th>
                                <th> Floor Name</th>
                                <th>Created At</th>
                                <th >Action</th>
                                {{ csrf_field() }}

                                @if(Auth::guard('admin')->user()->hasRole('superadmin'))
                                <th>Created By</th>
                            @endif
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
<script>
$(document).on('click','.deletebtn',function(){
        var roomID = $(this).attr("room-id");
        var btn=$(this);
        var resp = confirm("Are you sure?");
        if (resp == true) {
            console.log(roomID);
            $.ajax({
                url: 'rooms/delete/'+roomID,
                type: 'post',
                data: {
                    '_token':'{{csrf_token()}}',
                    '_method':'DELETE',
                },
                success: function (response) {
                    console.log(response);
                    if(response.response=='success'){
                    $('#myTable').DataTable().ajax.reload();  
                    }else{
                        alert(response.response);
                    }
                }
            });

        }
       
       });


</script>

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<script type="text/javascript">
$(document).ready(function() {
    var role = $('#my-role').attr("role");
    if(role=='superadmin'){
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
    }
    else{
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
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
        });
    }
});

</script>
@endsection