@extends('admin.index')
@section('content')
<form  method="post" action="/floors/store/{{$floor_number}}">
{{method_field('POST')}}
{{csrf_field()}}
<label>Number</label>
<input type="number" name="floor_number" value={{$floor_number}} disabled/>
<br/>
<label >Name </label>
<input type="text" name="name"/>
<br/>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection
