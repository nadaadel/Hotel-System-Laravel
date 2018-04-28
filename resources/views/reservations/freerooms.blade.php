@extends('layouts.app')
@section('content')
<center>
  <h1>Our Free Rooms</h1><br>
</center>
   <br>
   <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
            
                            <div class="panel-body">
                                <table id="myTable" class="table table-hover table-bordered table-striped datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                                        <th><strong> Room Number</strong></th>
                                                        <th><strong> Accompany Number </strong></th>
                                                        <th><strong> Room Price </strong></th>
                                                        <th><strong></strong></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('freerooms') }}',
                columns: [
                    {data: 'number', name: 'number'},
                    {data: 'capacity', name: 'capacity'},
                    {data: 'price', name: 'price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},      
                ]
            });
                
        });
        </script>

        @endsection