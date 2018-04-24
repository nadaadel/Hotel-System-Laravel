@extends('admin.index')
@section('content')
<form  method="post" action="/floors/update/{{$floor->id}}">
{{method_field('PUT')}}
{{csrf_field()}}
<label>Number</label>
<input type="number" name="number" value={{$floor->number}} disabled>
<br/>
<label >Name </label>
<input type="text" name="name" value="{{$floor->name}}" />
<br/>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection
