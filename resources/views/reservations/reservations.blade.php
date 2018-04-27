
@extends('layouts.app')
@section('content')
<center>
  <h1>Clients Reservations</h1><br>
   
   <br><table class="table table-striped">
   <th><strong> Client Name </strong></th>
        <th><strong> Room Number </strong></th>
        <th><strong> Accompany Number </strong></th>
        <th><strong> Client Paid Price </strong></th>

        @foreach ($reservations as $reservation)
        <tr>
        @foreach($reservation->rooms as $room)

<td>{{$reservation->name}}</td>
<td>{{$room->number}}</td>
<td>{{$room->pivot->accompany_number}}</td>
<td>{{$room->pivot->client_paid_price}}</td>
@endforeach

@endforeach
        </tr>
        </table>
        @endsection