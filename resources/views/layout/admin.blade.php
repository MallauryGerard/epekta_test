<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbar">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="#">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'property' ? 'active' : '' }}" href="#">{{ __('Properties') }}</a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" class="" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary mx-auto">
                    <i class="fas fa-power-off"></i>
                </button>
            </form>
        </div>
    </nav>
    <!-- Navbar -->
</header>

<main>
    @include('include.flashMessage')
    @yield('content')
</main>

<footer class="bg-dark text-center text-white">
    <div class="text-center py-3 bg-dark">
        <p>
            {{ date('Y') }} Réalisé par
            <a class="text-white" href="https://mallaury.be">Mallaury Gérard</a>
        </p>
    </div>
</footer>

<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/mdb.min.js') }}"></script>
<script src="{{ asset('/js/font-awesome.min.js') }}"></script>

@stack('scripts')

<script>
    $('.toast').delay(5000).fadeOut('slow');
</script>
</body>

</html>
