@extends('admin.index')
@section('content')
<form action="/users/create" method="GET">
    @csrf
    <input type="submit" class="btn btn-success"Value="Create Client">
</form>

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
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Country</th> 
                                <th>Created By</th>
                                <th>Action</th>
                                {{ csrf_field() }}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>


<script type="text/javascript">
-->

<script type="text/css"href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
<script type="text/css"href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"></script>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>


<script>
$(document).ready(function() {
    $('#myTable').DataTable({
       

        processing: true,
        serverSide: true,
        ajax: '{{ route('userslist') }}',
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'gender', name: 'gender'},
            {data: 'phone', name: 'phone'},
            {data: 'country', name: 'country'},
            {data: 'registered_by', name: 'registered_by'},
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ],
        
    
    });
});

</script>

@endsection
