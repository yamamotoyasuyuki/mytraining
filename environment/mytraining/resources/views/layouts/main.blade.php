<!doctype html>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    
    <title>@yield('title')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="{{ secure_asset('js/dropdown.js') }}" defer></script>
    <script src="{{ secure_asset('js/graph.js') }}" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    
    <style>
     　.container {font-family: 'Noto Sans JP', sans-serif;}
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
    {{--bootstrap関連--}}
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    {{--css関連--}}
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/calendar.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/pulldown.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/edit.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/graph.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom styles for this template -->
</head>
<body>
    <header>
        <div class="nav-main">
            <div class="nav-main-content">
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                    
                                <div class="dropdown-menu judgmentdiv" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item judgment" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>
                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                   
            </div>
            <ul class="nav-main-menu">
                <div class="bt-border-gradient-wrap bt-border-gradient-wrap--silver">
                <p class="bt bt-border-gradient"><span class="bt-text-gradient--silver">Menu</span></p>
                </div>
                <li class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                    <a href="{{route('home')}}" class="btn btn-border-gradient"><span class="btn-text-gradient--gold menuline">Home</span></a></li>
                <li class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                    <a href="{{ route('summary') }}" class="btn btn-border-gradient"><span class="btn-text-gradient--gold menuline">トレーニング</span></a></li>
                <li class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                    <a href="{{ route('achievement') }}" class="btn btn-border-gradient"><span class="btn-text-gradient--gold menuline">トレーニング実績</span></a></li>
                <li class="btn-border-gradient-wrap btn-border-gradient-wrap--gold">
                    <a href="{{route('config')}}" class="btn btn-border-gradient"><span class="btn-text-gradient--gold menuline">設定</span></a></li>
            </ul>
        </div>
    </header>
<main class="py-4">
@yield('content')
</main>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
  
</script>
  
  
</body>
</html>