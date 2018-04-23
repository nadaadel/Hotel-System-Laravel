@extends('admin.index')
@section('content')

        <form method="POST" action="/users/update/{{$user->id}}">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"  value="{{$user->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                        <input id="email" type="email" value="{{$user->email}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

        
                <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="form-group col-md-6">
                                <select id="inputState" class="form-control" name="gender" value="{{$user->gender}}">
                                  <option >Choose...</option>
                                  {{-- <option value="male" @if({{$user->gender}} == "male") echo "selected"; @endif>Male</option> --}}
                                  <option value="male">Male</option>                                  
                                  <option value="female">Female</option>
                                </select>
                      </div>
                </div>
                <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="number" value="{{$user->phone}}" name="phone" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="form-group col-md-6">
                                    <select id="inputState" class="form-control" name="country" value="{{$user->country}}">
                                      <option value="test" >Choose...</option>
                                      <option value="alexandria">Alexandria</option>
        
                                    </select>
                          </div>
                    </div>
                    <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Upload Yous Avatar') }}</label>
                            <div class="form-group col-md-6">
                            <input type="file" class="form-control-file" value="{{$user->avatar}}" name="avatar">

                            </div>
                          </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <input type="submit" value="Update">
                    </div>
                </div>
            </form>
      @foreach ($errors->all() as $error )
       <li>{{ $error }}</li>
       @endforeach
@endsection