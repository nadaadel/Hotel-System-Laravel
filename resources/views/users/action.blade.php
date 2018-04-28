<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
@if($actions=="yes")
<a href="/users/show/{{$id}}"  type="button" class="btn btn-xs btn-primary" >Show</a><br>

<a href="/users/edit/{{$id}}"  type="button" class="btn btn-warning" >Edit</a>
{{-- <button  floor-id={{$id}} value="delete" class="btn btn-danger deletebtn" >
    <i class="fa fa-trash go inline" aria-hidden="true"></i>
</button> --}}

<button user-id={{$id}} value="delete" 
class="btn btn-danger deletebtn">Delete</button>

@endif
</body>
</html>
