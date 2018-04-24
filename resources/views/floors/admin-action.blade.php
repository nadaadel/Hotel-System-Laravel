
<a href="/floors/edit/{{$id}}"  type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil-square"></i></a>
<form action="/floors/delete/{{$id}}" onsubmit="return confirm('Do you really want to delete?');" method="post" >
    {{csrf_field()}}
{{method_field('Delete')}}
<input name="_method" value="delete" type="submit" class="btn btn-danger" /></form>