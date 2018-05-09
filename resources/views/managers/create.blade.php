@extends('admin.index')
@section('content')
@hasrole('superadmin')
<div>Create Form</div>
<div class="card-body">
                    <form method="POST" action="/managers" enctype="multipart/form-data" >
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"  name="name" >
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
                            <input id="email" name="email" type="text" /> 
                            @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="national_id" class="col-md-4 col-form-label text-md-right">NationalId</label>

                            <div class="col-md-6">
                            <input id="national_id" name="national_id" type="number" /> 
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
                            <input id="password" name="password" type="password"  > 
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

                        <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                               
                            </div>
                        </div>

     
                    </form>
                </div>
                @else   
                <h1 style="color:red">Your are not have permission</h1>
             @endhasrole
             
@endsection