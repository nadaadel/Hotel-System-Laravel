<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
@if($actions=="yes")
<a href="/users/show/{{$id}}"  type="button" class="btn btn-xs btn-primary" >Show</a><br>

<a href="/users/edit/{{$id}}"  type="button" class="btn btn-warning" >Edit</a>
<form action="/users/delete/{{$id}}" onsubmit="return confirm('Do you really want to delete?');" method="post" >
    {{csrf_field()}}
{{method_field('Delete')}}
<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>

@endif
</body>
</html>
