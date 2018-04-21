<table class="table table-striped">
    <thead>
      <tr>
        <th>Client id</th>        
        <th>Name</th>
        <th>Email</th>               
        <th>Action</th>
      </tr>
    </thead>
    <!-- @foreach($posts as $post) -->
    <tbody>
<!--       <tr>
        <td id="pid">{{$post->id}}</td>        
        <td><a href="/post/{{$post->id}}"> {{$post->title}} </a></td>
        <td> {{$post->slug}} </td>        
        <td>{{$post->user->name}}</td>
        <td>{{$post->Date_Acc }}</td>
        <td> <form action="/post/{{$post->id}}" method="get">
          @csrf
          <input class="btn btn-primary"type="submit" value="View">
         </form>
         </td>
        <td> <form action="/post/edit/{{$post->id}}" method="get">
           @csrf
           <input class="btn btn-success"type="submit" value="Edit">
          </form>
          </td>
          <td><form action="/post/delete/{{$post->id}}" method="post" >
           @csrf
           {{method_field('DELETE')}}
           <button id="delete" onClick="return confirm('Are You Sure to Delete Post ?');" 
           class="btn btn-danger" >Delete</button>
          </form>
          </td>
      </tr> -->
    </tbody>
    <!-- @endforeach -->
  </table>