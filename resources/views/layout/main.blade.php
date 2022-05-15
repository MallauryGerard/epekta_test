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

@include('include.header')

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
