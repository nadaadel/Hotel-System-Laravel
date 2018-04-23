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
<h1>Room editing</h1>

<form method="post" action="/rooms/update/{{ $room->id}}">
{{csrf_field()}}
{{method_field('PUT')}}
Number :- <input disabled type="number" name="number" value="{{ $room->number }}">
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
ٌRoom Creator:-
<select class="form-control" name="created_by" >
@foreach ($roles as $role)
    <option @if($role->id == $room->role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
@endforeach

</select>

<br>

<input type="submit" value="Submit" class="btn btn-primary">
</form>
@endsection