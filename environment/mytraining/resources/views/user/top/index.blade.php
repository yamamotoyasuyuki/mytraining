@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'トップ画面')
  
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body class="text-center">
  <h1 class="h3 mb-3 font-weight-normal login-header register-header">welcome MyTraining</h1>
  <div id="app" class="col-md-5 ml-4">
    <a href="{{ url('/') }}"><img class="mb-4 signinimage container-fluid"  src="{{ secure_asset('images/fitness.jpg')}}"></a>
    <form class="form-signin  ml-sm-4 mt-4">
      @if (Route::has('login'))
        @auth
          <div>
            <a href="{{ url('/home') }}" role="button" class="btn btn-light btn-lg btndesign ml-2">ホーム</a>
          </div>
        @else
            <div class="mb-4">
            <a href="{{ route('login') }}" role="button" class="btn btn-light btn-lg btndesign ml-2">ログイン</a>
            </div>
          @if (Route::has('register'))
            <div class=" mb-4">
            <a href="{{ route('register') }}" role="button" class="btn btn-light btn-lg btndesign ml-2">新規登録</a>
            </div>
          @endif
        @endauth
      @endif
      <p class="mt-4 mb-0 mr-2 text-muted">&copy; 2017-2021</p>
    </form>
  <script>
  　　'use strict';
      document.getElementsByClassName('btn').location.href = "{{ route('register') }}"; // 
  </script>
  </div>
</body>
@endsection