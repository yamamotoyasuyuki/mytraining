@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'トップ画面')
  
{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body class="text-center">
  <div id="app">
    <img class="mb-4 signinimage"  src="{{ secure_asset('images/fitness.jpg')}}">
    <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">welcome MyTraining</h1>
      @if (Route::has('login'))
        @auth
          <div class="upbutton">
            <a href="{{ url('/home') }}" role="button" class="btn btn-lg btn-primary btn-block">ホーム</a>
          </div>
        @else
            <div class="upbutton">
            <a href="{{ route('login') }}" role="button" class="btn btn-lg btn-primary btn-block">ログイン</a>
            </div>
          @if (Route::has('register'))
            <div class="mybutton">
            <a href="{{ route('register') }}" role="button" class="btn btn-lg btn-success btn-block">新規登録</a>
            </div>
          @endif
        @endauth
      @endif
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
    </form>
  <script>
  　　'use strict';
      document.getElementsByClassName('btn').location.href = "{{ route('register') }}"; // 
  </script>
  </div>
</body>
@endsection