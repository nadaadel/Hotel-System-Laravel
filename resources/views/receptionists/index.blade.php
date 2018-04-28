@extends('admin.index')
@section('content')
<a href={{ URL::to('receptionists/create' )}} >
  <input type="button" class="btn btn-success" value='Create Receptionist '/></a>
<br/>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table id="myTable" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created-At</th>
                                @role('superadmin')
                                <th>Created By</th>
                                @endrole
                                <th >Action</th>
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
        ajax: '{{ url('data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data:'created_at',name:'created_at'},
            @role('superadmin')
            {data:'managername',name:'managername'}   ,
            @endrole
            {data: 'action', name: 'action', orderable: false, searchable: false},
          
        ]
    });
});
</script>
<script type="text/javascript">
    $(document).on('click','.deletebtn',function(){
            var id = $(this).attr("m-id");
            var btn=this;
            var resp = confirm("Are you sure?");
            if (resp == true) {
                $.ajax({ 
                    type: 'POST',
                    url:  '/receptionists/'+id ,
                    data:{
                    '_token':'{{csrf_token()}}',
                    '_method':'DELETE',
                    },
                    success: function (response) {
                        if(response.response=='success'){
                            var i = btn.parentNode.parentNode.rowIndex;
                            document.getElementById("myTable").deleteRow(i);
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
