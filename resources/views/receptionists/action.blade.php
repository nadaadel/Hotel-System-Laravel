
@if($role=="yes")
<a href="/receptionists/{{$id}}/edit"  type="button" class="btn btn-xs btn-success" >Edit</a>
<a href="/receptionists/{{$id}}"  type="button" class="btn btn-xs btn-warning" >Show</a><br>
<button  m-id={{$id}} value="delete" class="btn btn-danger deletebtn" >
        <i class="fa fa-trash go inline" aria-hidden="true"></i>
    </button>

@if($receptionist->isBanned())

<a  href="receptionists/{{$receptionist->id}}/ban" type="button" class="btn btn-xs btn-primary" id="pushme" >UnBan</a><br>

@else

<a href="receptionists/{{$receptionist->id}}/ban" type="button" class="btn btn-xs btn-primary" id="pushme" >Ban</a><br>

@endif

@endif

