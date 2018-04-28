
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<bod>

@if($role=="yes")

<a href="/receptionists/{{$id}}/edit"  type="button" class="btn btn-xs btn-success" >Edit</a>
<a href="/managers/{{$id}}"  type="button" class="btn btn-xs btn-warning" >Show</a><br>
<button id={{$id}}  value="delete" class="btn btn-danger deletebtn" ><script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
        <i class="fa fa-trash go inline" aria-hidden="true"></i>
</button>

@if($receptionist->isBanned())

<a  href="receptionists/{{$receptionist->id}}/unban" type="button" class="btn btn-xs btn-primary" id="pushme" >UnBan</a><br>

@else

<a href="receptionists/{{$receptionist->id}}/ban" type="button" class="btn btn-xs btn-primary" id="pushme" >Ban</a><br>

@endif

@endif

</body>

</html>

