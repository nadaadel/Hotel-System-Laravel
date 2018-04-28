
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<bod>

@if($ban=="yes")

<a href="/receptionists/{{$id}}/edit"  type="button" class="btn btn-xs btn-success" >Edit</a>
<a href="/managers/{{$id}}"  type="button" class="btn btn-xs btn-warning" >Show</a><br>
<form action="/receptionists/{{$id}}" onsubmit="return confirm('Do you really want to delete?');" method="post" >
    {{csrf_field()}}
{{method_field('Delete')}}
<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>

@if($receptionist->isBanned())

<a  href="receptionists/{{$receptionist->id}}/unban" type="button" class="btn btn-xs btn-primary" id="pushme" >UnBan</a><br>

@else

<a href="receptionists/{{$receptionist->id}}/ban" type="button" class="btn btn-xs btn-primary" id="pushme" >Ban</a><br>

@endif

@endif

</body>

</html>

