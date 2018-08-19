<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('realTime').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
</head>
<body onload="startTime()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Koperasi Binus University
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="{{ route('message') }}" role="button">
                                Messages
                                @isset($notif)
                                    @if($notif->count>0)
                                        <sup style="color: white;background-color: red;border-radius: 100%;padding: 1px 5px;">{{ $notif->count }}</sup>
                                    @endif  
                                @endisset
                            </a>
                        </li>
                        @if(Auth::user()->hasAnyRole(['user']))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Add Form <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('add-form') }}" >
                                        Peminjaman
                                    </a>
                                    <a class="dropdown-item" href="{{ route('add-pengunduran-diri-form') }}" >
                                        Pengunduran Diri
                                    </a>
                                </div>
                            </li>
                        @endif
                        @if(Auth::user()->hasAnyRole(['admin']))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('admin-list-user') }}" role="button">
                                    List Users
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('admin-list-banner') }}" role="button">
                                    List Banner
                                </a>
                            </li>
                        @endif                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     
                                    <a class="dropdown-item" href="{{ route('list-simpanan') }}">
                                        Simpanan
                                    </a> 
                                    @if(Auth::user()->hasAnyRole(['admin']))
                                        <a class="dropdown-item" href="{{ route('history-form') }}">
                                            History
                                        </a>     
                                     @endif  
                                    <a class="dropdown-item" href="{{ route('detail-profile',['id'=> Auth::user()->id]) }}">
                                        Profile
                                    </a>    

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>
                            <!-- <span>Time:  -->
                                <div id="realTime" style="padding:0.5rem;color:white;display:inline-block;"></div>
                            <!-- </span> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
        //Slide Show Image
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("slider");
            if (n > x.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
        }
</script>
</html>
