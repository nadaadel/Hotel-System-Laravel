
<a href="/managers/{{$id}}/edit"  type="button" class="btn btn-xs btn-primary" >Edit<i class="fa fa-pencil-square"></i></a><br>
<a href="/managers/{{$id}}"  type="button" class="btn btn-xs btn-warning" >Show<i class="fa fa-pencil-square"></i></a><br>
<form action="/managers/{{$id}}" onsubmit="return confirm('Do you really want to delete?');" method="post" >
    {{csrf_field()}}
{{method_field('Delete')}}
<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>