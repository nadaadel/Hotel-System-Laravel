
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
<form  method="post" action="/client/store/{{$room->id}}">
        {{method_field('POST')}}
        {{csrf_field()}}
        <label>Enter your Accompany Number</label>
<input type="number" name="accompany_number" max="{{$room->capacity}}" />
        <br/>
        <label>Paid Price in cents</label>
        <input type="number" name="price" />
        <br/>
        <input type="submit" value="Submit" class="btn btn-primary">
        </form>
@endsection
