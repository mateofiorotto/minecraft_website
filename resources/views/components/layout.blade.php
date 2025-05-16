<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Minecraft</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>

    <header id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- logo -->
                <a id="logo" class="navbar-brand" href="{{ route('home') }}"><span class="d-none">Logo
                        MC</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- izq -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <x-nav-link route="home">Home</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="editions">Ediciones</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="posts">Posts</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="contact">Contacto</x-nav-link>
                        </li>
                    </ul>

                    <!-- derecha -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center" id="auth-acciones">
                        @guest
                            <!-- Usuario NO autenticado -->
                            <li class="nav-item me-2 iniciar-sesion">
                                <x-nav-link route="auth.login" class="btn btn-outline-primary px-3 ">Iniciar
                                    sesión</x-nav-link>
                            </li>
                            {{-- <li class="nav-item me-2">
                                <x-nav-link route="auth.register"
                                    class="btn btn-primary nav-link px-3">Registrarse</x-nav-link>
                            </li> --}}
                        @else
                            <!-- Usuario autenticado -->
                            <li class="nav-item me-3">
                                <span>{{ Auth::user()->name }}</span>
                            </li>

                            @if (Auth::user()->role === 'admin')
                                <li class="nav-item me-2 dashboard-li">
                                    <x-nav-link route="dashboard" class="btn btn-outline-primary px-3"><i class="bi bi-speedometer2 dashboard"><span class="d-none">Icono de dashboard</span></i></x-nav-link>
                                </li>
                            @endif

                            <li class="nav-item logout-li">
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn"><i class="bi bi-box-arrow-in-right logout"><span class="d-none">Icono de logout</span></i></button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1 class="d-none">Minecraft | {{ $title ?? '' }}</h1>
        {{ $slot }}
    </main>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <a class="d-block" id="logo-footer" href="{{ route('home') }}"><span class="d-none">Logo
                            MC</span></a>
                    <p class="text-light">Deja volar tu imaginación</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h2>Explora</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('editions') }}">Editions</a></li>
                        <li><a href="{{ route('posts') }}">Posts</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h2>Seguinos</h2>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Github</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
