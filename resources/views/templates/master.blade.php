<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KENYANGIN : Website Pesan Antar Makanan Online</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

<body>
    <!-- navbar -->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-white righteous" href="{{ route('index') }}">
                    <img src="{{ asset('img/logo-nav.png') }}" alt="">
                    KENYANG.IN
                </a>
                <span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active text-white p400" aria-current="page" href="#">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Menu</a>
                            </li>
                            <li>
                                @if(Auth::user())
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#"> Hai {{ Auth::user()->name }} ❤</a>
                                </li>
                                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <a href="{{ route('register') }}" class="btn btn-warning text-white">Daftar</a>
                            <a href="{{ route('login') }}" class="btn btn-warning text-white">Masuk</a>
                            @endif
                            </li>
                        </ul>
                </span>
            </div>
        </nav>
        </div>
    </section>


    @yield('content')

    <!-- footer -->
    <section>
        <footer>developed by group 6</footer>
    </section>

</body>

</html>