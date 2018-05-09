@extends('layouts.app')
@section('content')
@hasrole('superadmin|manager')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Room editing</h1>
<form method="post" action="/rooms/update/{{ $room->id}}">
{{csrf_field()}}
{{method_field('PUT')}}
Number :- <input type="number" name="number" value="{{ $room->number }}">
<br><br>
Capacity :- 
<input type="number"   name="capacity"  value="{{$room->capacity}}"> 
<br><br>
Price in Cents :- 
<input type="number"   name="price"  value="{{$room->price}}"> 
<br>
<br>
Floor Name:-
<select class="form-control" name="floor_id" >
@foreach ($floors as $floor)
    <option @if($floor->id == $room->floor->id) selected @endif value="{{$floor->id}}">{{$floor->name}}</option>
@endforeach

</select>
<br>

<br>

<input type="submit" value="Submit" class="btn btn-primary">
</form>
@else   
   <h1 style="color:red">Your are not have permission</h1>
@endhasrole

@endsection