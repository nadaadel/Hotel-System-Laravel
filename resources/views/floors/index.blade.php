@extends('admin.index')
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
    <!-- if is Admin --><td> {{ $floor->Role->name}} </td>
    <!-- if created by this Admin -->
      <td><a href={{ URL::to('floors/edit/'. $floor->id ) }} type="button" class="btn btn-warning" >Edit</a></td>
 <td> 
   <form action="" onsubmit="return confirm('Do you really want to delete?');" method="post" ><input name="_method" value="delete" type="submit" class="btn btn-danger" />
    {!! csrf_field() !!}
    {{method_field('Delete')}}</form></td>

</tr>
@endforeach
</table>
@endsection
