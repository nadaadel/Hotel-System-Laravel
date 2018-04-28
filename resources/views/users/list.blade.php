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
                            @role('superadmin')
                                <th>Created By</th>
                            @endrole
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
            {data: 'phone', name: 'phone'},
            {data: 'country', name: 'country'},
        @role('superadmin')

            {data: 'managername', name: 'managername'},
            
        @endrole

            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
    
    });
});
</script>
<script>
    $(document).on('click','.deletebtn',function(){
            var user_id = $(this).attr("user-id");
            console.log(user_id)
            var resp = confirm("Are you sure?");
            if (resp == true) {
                $.ajax({ 
                    type: 'POST',
                    url: '/users/delete/'+user_id ,
                    data:{
                    '_token':'{{csrf_token()}}',
                    '_method':'DELETE',
                    },
                    success: function (response) {
                        if(response.response=='success'){
                        $('#myTable').DataTable().ajax.reload();
                        }
                        else{
                            alert(response.response);
                        }
                    }
                });
            }
           });
    </script>  
@endsection
