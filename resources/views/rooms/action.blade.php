@if($flag=='yes')
<a href="/rooms/edit/{{$id}}"  type="button" class="btn btn-warning" >Edit</a>
 <a class="btn btn-xs btn-danger">
 <i class="glyphicon glyphicon-trash deletebtn" room-id={{$id}} {{ csrf_token() }}> Delete </i> </a> 
 @endif 