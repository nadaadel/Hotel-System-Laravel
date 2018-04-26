@extends('admin.index')
@section('content')

        @if(count($user))
            <fieldset>
                <legend style="background-color: gray">User Creator Info </legend>
                <img src=" {{ Storage::url('/uploads/'.$user->avatar) }}" alt="Post-Image">
                <p>Name : {{ $user->name }}</p>
                <p>Email:{{ $user->email }}</p>
                <p>Gender:{{ $user->gender }}</p>        
                <p>Phone :{{ $user->phone }}</p>
                <p>Country:{{ $user->country }}</p>
                <p>Phone :{{ $user->last_logged }}</p>
               <hr> 
            </fieldset>
            @endif 

@endsection
