@extends('layouts.app')
@section('content')

<div class="container">
            <h3 class="col-lg-6 text-right">Reservation Pending Approval</h3>  
    <table class="table table-striped" style="margin-top:19px">
      <thead>
        <tr>
          <th>Client id</th>        
          <th>Name</th>
          <th>Room Number</th>        
          <th>Room Capacity</th>
          <th>Accompany Number</th>
          <th>Client Paid Price</th>
          <th>Action</th>
        </tr>
      </thead>
      @foreach($users as $user)
      <tbody>
        <tr>
          <td>#{{$user->id}}</td>        
          <td>{{$user->name}} </td>
          <td> {{$user->room_number}} </td>        
          <td>{{$user->capacity}}</td>
          <td>{{$user->client_paid_price}}</td>
           <td><form action="/reservations/accept/{{$user->id}}" method="get">
             @csrf
             <input class="btn btn-success"type="submit" value="Accept">
            </form>
            </td>
            <td><form action="/reservations/cancel/{{$user->id}}" method="post" >
             @csrf
             {{method_field('DELETE')}}
             <button id="delete" class="btn btn-danger" >Cancel</button>
            </form>
            </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    <div style="text-align: -webkit-center;" class="pagination" > 
        {{ $users->links()}}
      </div>
  </div>
  <script>
        myfunc = function(){
       result =confirm("Are You Sure to Delete Post ?");
        if(result){
         return true;
        } 
       }
 
       // $("#pid").click(function(){
       //  result =confirm("Are You Sure to Delete Post ?");
       // if(result){
       //    console.log('yes a baba :D');
       //  } 
 
       // })
    
     </script>
@endsection
