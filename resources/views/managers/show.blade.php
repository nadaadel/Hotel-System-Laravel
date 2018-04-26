@extends('admin.index')
@section('content')

        @if($manager)
            <fieldset>
                <legend style="background-color: gray">Manager Info </legend>
                <img src="{{Storage::url($manager->avatar)}}" alt="Post-Image" height="300px" width="300px">
                <p>Name : {{ $manager->name }}</p>
                <p>Email:{{ $manager->email }}</p>
                <p>National Id:{{ $manager->national_id }}</p>        
                
               <hr> 
            </fieldset>
            
       @endif
@endsection
