@extends('layouts.admin')
@section('title', '新規登録')
@section('content')
        <div class="col-sm-2 mb-2">
            <h3 class="login-header register-header">{{ __('messages.Register') }}</h3>
        </div>    
        <div class="row col-md-5 ml-4">
            <a href="{{ url('/') }}"><img class="mb-4 signinimage container-fluid"  src="{{ secure_asset('images/fitness.jpg')}}"></a>
            <div class="col-sm-12">
                
                <div class="mr-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mr-4">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('messages.Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror textbox" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mr-4">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror textbox" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mr-4">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('messages.password') is-invalid @enderror textbox" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mr-4">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control textbox" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mr-4">
                            <div class="form-group row mb-1  col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-light btn-lg btndesign">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
