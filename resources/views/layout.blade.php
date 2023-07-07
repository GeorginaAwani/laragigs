@php
    header('Cache-Control: no-cache, must-revalidate');
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laragigs</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'
        integrity='sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=' crossorigin='anonymous'></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <nav class="bg-white border-bottom border-light fixed-top navbar navbar-expand-lg" id="mainNavbar"
        data-bs-theme="light">
        <div class="container">
            <a href="/"
                class="bg-warning-subtle font-script fw-bolder h1 mb-0 navbar-brand px-1 px-2 text-warning">LG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav mb-0" id="mainNav">
                    @auth
                        <li class="nav-item mx-1">
                            <div class="fw-bold nav-link">Welcome {{ auth()->user()->name }}</div>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link position-relative px-3 py-2" href="/listings/manage"><i
                                    class="fa-regular fa-cogs me-1"></i>Manage listings</a>
                        </li>
                        <li>
                            <form action="/logout" method="POST" class="mb-0">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm px-3 py-2">Log out</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item mx-1">
                            <a class="nav-link position-relative px-3 py-2" href="/register"><i
                                    class="fa-regular fa-user-plus me-1"></i>Register</a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link position-relative px-3 py-2" href="/login"><i
                                    class="fa-solid fa-sign-in me-1"></i>Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- VIEW OUTPUT --}}
    <main class="py-5">
        <div class="pb-5">
            @yield('content')
        </div>
    </main>

    <x-flash-message></x-flash-message>

    <footer class="bg-dark py-3 text-white bg-opacity-75 fixed-bottom" id="footer">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Copyright <i class="fa-solid fa-copyright"></i> {{ date('Y') }}. All rights reserved.
                </div>
                <a href="/listings/create" class="btn btn-warning rounded-0">Post Job</a>
            </div>
        </div>
    </footer>
</body>

</html>
