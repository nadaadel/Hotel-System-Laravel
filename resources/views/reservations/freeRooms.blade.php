@extends('layouts.app')
@section('content')
<center>
  <h1>Our Free Rooms</h1><br>
        </center>
   <br><table class="table table-striped">
      
        <th><strong> Room ID </strong></th>
        <th><strong> Accompany Number </strong></th>
        <th><strong> Room Price </strong></th>
        <th><strong></strong></th>

        @foreach ($rooms as $room)
        <tr>
<td> {{ $room->id}} </td>
<td> {{ $room->capacity}}</td>
<td>{{ $room->price/100 }}$</td>

<td><a href={{ URL::to('/client/rooms/'. $room->id  ) }} type="button" class="btn btn-warning" >Make Reservation</a></td>


@endforeach

        </tr>
        </table>
        @endsection