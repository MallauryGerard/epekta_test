<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title')</title>

    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
</head>

<body>

<header class="header navbar-area">

</header>

<main>
    @yield('content')
</main>

<footer class="bg-dark text-center text-white">
    <!-- Copyright -->
    <div class="text-center py-3 bg-dark">
        <p>
            {{ date('Y') }} Réalisé par
            <a class="text-white" href="https://mallaury.be">Mallaury Gérard</a>
        </p>
    </div>
    <!-- Copyright -->
</footer>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/mdb.min.js"></script>

</body>

</html>
