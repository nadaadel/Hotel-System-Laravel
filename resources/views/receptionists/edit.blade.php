@extends('admin.index')
@section('content')
<div class="card-body">
                    <form method="POST" action="/receptionists/{{$receptionist->id}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"  name="name" value= {{$receptionist->name}} >
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                            <input id="email" name="email" type="text" value= {{$receptionist->email}} >
                            @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="national_id" class="col-md-4 col-form-label text-md-right">National Id</label>

                            <div class="col-md-6">
                            <input id="national_id" name="national_id" type="text" value= {{$receptionist->national_id}} >
                            @if ($errors->has('national_id'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                            <input id="password" name="password" type="password" value= {{$receptionist->password}} >
                            @if ($errors->has('password'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                               
                        </div>
                        
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <label>Select Image to upload</label>
                            <input type="file" name="photo" id="photo">
                            @if ($errors->has('photo'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            
                          </div>
                        </div>
                        <input id="created_by" name="created_by" type="hidden" value= {{$receptionist->created_by}} >

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>

                               
                            </div>
                        </div>

     
                    </form>
                </div>


@endsection