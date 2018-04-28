@extends('admin.index')
@section('content')
<a href={{ URL::to('floors/create' )}} >
  <input type="button" class="btn btn-success" value='Create Floor '/></a>
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
                                @if(Auth::guard('admin')->user()->hasRole('superadmin'))
                                <th>Manager Name</th>
                                @endif
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
        ajax: '{{ route('floors') }}',
        @if(Auth::guard('admin')->user()->hasRole('superadmin'))
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'number', name: 'number'},
            {data: 'admin.name', name: 'admin.name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
        @else
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'number', name: 'number'},
            {data: 'action', name: 'action', orderable: false, searchable: false},      
        ]
        @endif
    });
        
});
</script>
<script>
    $(document).on('click','.deletebtn',function(){
            var floor_id = $(this).attr("floor-id");
            var resp = confirm("Are you sure?");
            if (resp == true) {
                $.ajax({ 
                    type: 'POST',
                    url: '/floors/'+floor_id ,
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
