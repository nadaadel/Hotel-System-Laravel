@extends('admin.index')
@section('content')

  <h1>Rooms Data</h1> <a href="/rooms/create" >
    <center><button class="btn-success">Create Room</button></a></center>
        <table class="table table-striped">
      
        <th><strong> Number </strong></th>
        <th><strong> Capacity </strong></th>
        <th><strong> Price </strong></th>
        <th><strong> Floor Name </strong></th>
        <th><strong> Created At </strong></th>
        <th><strong> Created By </strong></th>
      

        <th><strong> Actions </strong></th>

        @foreach ($rooms as $room)
        <tr>

<td> {{ $room->number }} </td>
<td> {{ $room->capacity }} </td>
<td > {{ $room->price/100 }} $</td>
<td>{{ $room->floor->name }} </td>
<td> {{ date('M j, Y', strtotime( $room->created_at )) }} </td>
<td>{{$room->role->name}} </td>
<td>    
    <a href="/rooms/edit/{{ $room->id }}" ><button class="btn-warning">Edit</button></a>

    <form action="/rooms/delete/{{$room->id}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')" value="Delete"/>Delete</button>
            </form>

@endforeach

        </tr>
        </table>
        @endsection