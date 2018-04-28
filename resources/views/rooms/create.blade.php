@extends('layouts.app')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Add New Room</h1>

<form method="post" action="/rooms">
{{ csrf_field() }}
Number :- 
<input type="number"    name="number" > 
<br><br>
Capacity :- 
<input type="number"    name="capacity" > 
<br><br>
Price in Cents :- 
<input type="number"   name="price"  > 
<br><br>
Floor Name:-
<select class="form-control" name="floor_id" >
@foreach ($floors as $floor)
    <option value="{{$floor->id}}">{{$floor->name}}</option>
@endforeach

</select>
<br>


<br>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection