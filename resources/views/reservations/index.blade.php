
@extends('layouts.app')
@section('content')
<center>
  <h1>My Reservations</h1><br>
   <a href="#" >
   <button class="btn-success">New Reservation</button></a></center>
   <br><table class="table table-striped">
      
        <th><strong> Room Number </strong></th>
        <th><strong> Accompany Number </strong></th>
        <th><strong> Paid Price </strong></th>

        @foreach ($reservations as $reservation)
        <tr>
<td> {{ $reservation->room_id }} </td>
<td> {{ $reservation->accompany_number }} </td>
<td > {{ $reservation->client_paid_price/100 }} $</td>

@endforeach

        </tr>
        </table>
        @endsection