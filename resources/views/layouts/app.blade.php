<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    @stack('css')

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand  text-primary " href="{{route('index')}}">Log Files</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            @if(session('username'))
                            <div class="btn-group">
                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      {{session('username')}}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @else
                                <a class="nav-link" href="{{route('login.page')}}">Login</a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Example split danger button -->

        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    <footer style="position: fixed;bottom: 0;width:100%;">
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-1 px-1 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="https://facebook.com/galal.husseny" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.linkedin.com/in/galal-husseny/" class="text-white me-4">
                    <i class="fab fa-linkedin-in"></i>
                </a>

            </div>
            <!-- Right -->
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    @stack('js')
</body>

</html>
