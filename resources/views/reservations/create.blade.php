
@extends('admin.index')
@section('content')
<form  method="post" action="/client/store/{{$room->id}}">
        {{method_field('POST')}}
        {{csrf_field()}}
        <label>Enter your Accompany Number</label>
<input type="number" name="accompany_number" max="{{$room->capacity}}" />
        <br/>
        <label>Paid Price</label>
        <input type="number" name="price" />
        <br/>
        <input type="submit" value="Submit" class="btn btn-primary">
        </form>
@endsection