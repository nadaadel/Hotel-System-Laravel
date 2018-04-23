@extends('admin.index')
@section('content')

<div class="container">
    <div class="row">
            <h3 class="col-lg-6">All Clients</h3>  
            <div class="col-lg-6" style="text-align: right; ">
                     
              <form action="/users/create" method="GET">
                <input  class="btn btn-success text-right" type="submit" value="Create user">
            </form>
            </div>
    </div>
    <table class="table table-striped" style="margin-top:19px">
      <thead>
        <tr>
          <th>Client id</th>        
          <th>Name</th>
          <th>Email</th>        
          <th>Approved  By</th>
          <th>Action</th>
        </tr>
      </thead>
      @foreach($users as $user)
      <tbody>
        <tr>
          <td id="pid">#{{$user->id}}</td>        
          <td><a href="/users/show/{{$user->id}}"> {{$user->name}} </a></td>
          <td> {{$user->email}} </td>        
          <td>{{$user->approved_by}}</td>
          <td> <form action="/users/show/{{$user->id}}" method="get">
            @csrf
            <input class="btn btn-primary"type="submit" value="View">
           </form>
           </td>
           <td><form action="/users/edit/{{$user->id}}" method="get">
             @csrf
             <input class="btn btn-success"type="submit" value="Edit">
            </form>
            </td>
            <td><form action="/users/delete/{{$user->id}}" method="post" >
             @csrf
             {{method_field('DELETE')}}
             <button id="delete" onClick="return confirm('Are You Sure to Delete This User ?');" 
             class="btn btn-danger" >Delete</button>
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
