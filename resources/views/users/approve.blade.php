@extends('admin.index')

@section('content')

@if($user->isBanned())

<div>You are banned</div>

@else
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table id="myTable" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobil</th>
                                <th>Country</th>
                                <th>Gender</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('users/data') }}',
        columns: [
           
            {data: 'name', name: 'name'},
           
            {data:'email',name:'email'},
            {data:'phone',name:'phone'},
            {data:'country',name:'country'},
            {data:'gender',name:'gender'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
        ]
    });
});
</script>
@endsection
