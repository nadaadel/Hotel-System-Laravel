@extends('admin.index')
@section('content')

<div class="container">
        <div class="col-md-8">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('storeUser') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name"class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                      
              

                        <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="form-group col-md-6">
                                        <select id="inputState" class="form-control" name="gender">
                                          <option value="   " >Choose...</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>
                                        </select>
                              </div>
                              @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" name="phone" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
    
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                                    <div class="form-group col-md-6">
                                            <select id="inputState" class="form-control" name="country">
                                              <option value="" >Choose...</option>
                                              @foreach ($countries as $key => $value )
                                            <option>{{ $value["name"] }}</option> 
                                              @endforeach
                
                                            </select>
                                  </div>
                            </div>
                            <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Yous Avatar') }}</label>
                                    <div class="form-group col-md-6">
                                    <input type="file" class="form-control-file" name="avatar">

                                    </div>
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                                  </div>

                                  @if(count($errors)) 
                                  <ul>
                                      @foreach($errors->all() as $error) 
                                            <li style="color:red">{{ $error }}</li>
                                      @endforeach 
                                  </ul>
                              @endif 


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary"
                                    value="Create New Client" />
                            </div>
                        </div>
                    </form>
    </div>
</div>
@endsection
