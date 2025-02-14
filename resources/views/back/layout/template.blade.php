<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('back/css/custom.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('back/css/dashboard.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
    @stack('css')
</head>

<body>
    {{--
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Welcome {{ auth()->user()->name }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header> --}}

    <header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="background-color: rgba(0, 0, 0, 0);">BlogBerry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown <span data-feather="chevron-down" class="align-text-bottom"></span>
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('dashboard') }}">
                                    <span data-feather="home" class="align-text-bottom"></span>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('article') }}">
                                    <span data-feather="file" class="align-text-bottom"></span>
                                    Articles
                                </a>
                            </li>

                            @if (auth()->user()->role == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('categories') }}">
                                        <span data-feather="list" class="align-text-bottom"></span>
                                        Categories
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->role == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('users') }}">
                                        <span data-feather="users" class="align-text-bottom"></span>
                                        Users
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('users') }}">
                                        <span data-feather="user" class="align-text-bottom"></span>
                                        Profile
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">

            {{-- panggil sidebar menu --}}
            {{-- @include('back.layout.sidebar') --}}

            {{-- panggil section content --}}
            @yield('content')

            {{-- footer --}}

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ asset('back/js/dashboard.js') }}"></script>

    @stack('js')
</body>

</html>

{{-- before gpt --}}
