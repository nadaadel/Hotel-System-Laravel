   
<form action="{{ URL::to('/floors/delete/'. $id ) }}" onsubmit="return confirm('Do you really want to delete?');" method="post" >
    <a href="/floors/edit/{{$id}}"  type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil-square"></i></a>
    <button name="_method" value="delete" class="btn btn-danger" >
        <i class="fa fa-trash go inline" aria-hidden="true"></i>
    </button>
    {!! csrf_field() !!}
    {{method_field('Delete')}}</form>