<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Minecraft</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/static-images/favicon.webp') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                            <x-nav-link route="posts">Noticias</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="contact">Contacto</x-nav-link>
                        </li>
                    </ul>

                    <!-- derecha -->
                    <ul class="navbar-nav ms-auto d-flex align-items-baseline align-items-lg-center text-center mt-2 mt-lg-0"
                        id="auth-acciones">
                        @guest
                            <!-- Usuario NO autenticado -->

                            <li class="nav-item me-3 iniciar-sesion mb-3 mb-lg-0">
                                <x-nav-link route="auth.login" class="btn btn-outline-primary px-3 ">Iniciar
                                    sesión</x-nav-link>
                            </li>
                            <li class="nav-item registrarse pe-2 ps-2">
                                <x-nav-link route="auth.register"
                                    class="btn btn-outline-primary px-3 ">Registrarse</x-nav-link>
                            </li>
                        @else
                            <!-- Usuario autenticado -->
                            <li class="nav-item me-3">
                                <x-nav-link route="profile" class="btn btn-outline-primary px-3">{{ Auth::user()->name }}</x-nav-link>
                            </li>

                            <li>
                                <ul class="list-unstyled d-flex align-items-center gap-3 mt-lg-0 mt-2">
                                    @if (Auth::user()->role === 'admin')
                                        <li class="nav-item me-2 dashboard-li">
                                            <x-nav-link route="dashboard" class="btn btn-outline-primary px-3"><i
                                                    class="bi bi-speedometer2 dashboard"><span class="d-none">Icono de
                                                        dashboard</span></i></x-nav-link>
                                        </li>
                                    @endif

                                    <li class="nav-item logout-li">
                                        <form method="POST" action="{{ route('auth.logout') }}">
                                            @csrf
                                            <button class="btn p-0" type="submit"><i
                                                    class="bi bi-box-arrow-in-right logout"><span class="d-none">Icono de
                                                        logout</span></i></button>
                                        </form>
                                    </li>
                                </ul>
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
            <div class="row justify-content-center align-items-center gap-5 gap-lg-0">
                <div class="col-lg-4 col-md-12 text-center">
                    <a class="d-block m-auto" id="logo-footer" href="{{ route('home') }}"><span class="d-none">Logo
                            MC</span></a>
                    <p class="text-light mt-4 volar">Deja volar tu imaginación</p>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <h2>Explora</h2>
                    <ul class="list-unstyled">
                        <li class=""><a href="{{ route('home') }}">Home</a></li>
                        <li class="nav-link"><a href="{{ route('editions') }}">Ediciones</a></li>
                        <li><a href="{{ route('posts') }}">Noticias</a></li>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 text-center">
                    <h2 class="pb-2">Seguinos</h2>
                    <ul class="list-unstyled d-flex gap-5 justify-content-center align-items-center">
                        <li><a target="_blank" rel="noopener noreferrer" href="https://x.com/Minecraft"><i
                                    class="bi bi-twitter-x"><span class="d-none">X</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/minecraft"><i
                                    class="bi bi-instagram"><span class="d-none">Instagram</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/minecraft"><i
                                    class="bi bi-youtube"><span class="d-none">YouTube</span></i></a></li>
                        <li><a target="_blank" rel="noopener noreferrer"
                                href="https://www.github.com/mateofiorotto"><i class="bi bi-github"><span
                                        class="d-none">Github</span></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
