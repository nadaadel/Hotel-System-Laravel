@extends('admin.index')
@section('content')

  <h1>Managers Data</h1><a href='/managers/create'><button  type="button" class="btn btn-success">New Manager</button></a>
        <table class="table table-striped">
      
        <th><strong> Name </strong></th>
        <th><strong> Email </strong></th>
        <th><strong> Actions </strong></th>

        @foreach ($managers as $manager)
        <tr>

<td> {{ $manager->name }} </td>
<td> {{ $manager->email }} </td>

<td>   


<a href='/managers/{{$manager->id }}/edit' ><button class="btn-warning">Edit</button></a>


    
    <a href='/managers/{{$manager->id}}'><button class="btn btn-default">View</button></a>
    <form method='post' action='/managers/{{$manager->id}}'>
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure You Would Like to Delete This Post?');">Delete</button>
    </form>

@endforeach

        </tr>
        </table>
        @endsection