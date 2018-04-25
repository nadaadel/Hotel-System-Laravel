@extends('admin.index')

@section('content')
<a href={{ URL::to('/users/create' )}} >
  <input type="button" class="btn btn-success" value='Create Client '/></a>
<br/>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table id="myTable" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Admin No</th>
                              {{-- @role('superadmin') --}}
                                <th >Action</th>
                              {{-- @endrole --}}
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
        ajax: '{{ route('userslist') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'gender', name: 'gender'},
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
    });
});
</script>
@endsection
