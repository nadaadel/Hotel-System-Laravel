@if($flag=='yes')
<a href="/rooms/edit/{{$id}}"  type="button" class="btn btn-warning" >Edit</a>
 <a class="btn btn-xs btn-danger deletebtn" room-id='{{$id}}'>
 <i class="glyphicon glyphicon-trash "  {{ csrf_token() }}> Delete </i> </a> 
 @endif 