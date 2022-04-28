@extends('layouts.admin')

@section('title', 'ログイン画面')

@section('content')
<i class="fa-thin fa-alicorn"></i>
    <dsv class="container row col-sm-12 justify-content-center">
        <div class="col-md-5">
            <div class="login-header col-sm-4 offset-sm-4 mb-3">{{ __('messages.Login') }}</div>
            <a href="{{ url('/') }}"><img class="mb-4 signinimage container-fluid"  src="{{ secure_asset('images/fitness.jpg')}}"></a>
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right ml-4">{{ __('messages.E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} textbox" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label text-md-right ml-4">{{ __('messages.Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} textbox" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row col-md-8 checkbox offset-md-2">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                        </label>
                    </div>
                    <div class="col-sm-8 ml-3 mb-4 justify-content-end">
                        <button type="submit" class="btn btn-light btn-lg btndesign" >
                            {{ __('messages.Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
