<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>
    
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/cover/">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
    </style>

    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ secure_asset('css/signin.css') }}" rel="stylesheet">
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body class="text-center">
  <div class="entire">
  <header class="signin-nav">
   <div class="signin-nav-content">
     <a href="https://dde0a5f9c85f40c08433a37789e23c97.vfs.cloud9.us-east-2.amazonaws.com/"　class="oppai">ホーム</a>
   </div>
  </header>
  @yield('content')
  </div>
  </body>
</html>
