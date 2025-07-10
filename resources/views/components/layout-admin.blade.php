<!--LAYOUT BLADE-->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Admin Minecraft</title>
     <link rel="icon" type="image/x-icon" href="{{ asset('storage/static-images/favicon.webp') }}">
    <link rel="stylesheet" href="{{ asset('css/styles-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                            <x-nav-link route="dashboard">Dashboard</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="posts.index">Posts</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="editions.index">Ediciones</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="categories.index">Categorias</x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link route="tags.index">Etiquetas</x-nav-link>
                        </li>
                        <li class="nav-item">
                          <x-nav-link route="users.index">Usuarios</x-nav-link>
                        </li>
                    </ul>

                    <!-- derecha -->
                   <ul class="navbar-nav ms-auto d-flex align-items-baseline align-items-lg-center text-center mt-2 mt-lg-0"
                        id="auth-acciones">
                            <li class="nav-item me-3">
                                <x-nav-link route="profile" class="btn btn-outline-primary px-3">{{ Auth::user()->name }}</x-nav-link>
                            </li>

                            <li>
                              <ul class="list-unstyled d-flex align-items-center gap-3 mt-lg-0 mt-2">
                                    <li class="nav-item me-2 home-li">
                                        <x-nav-link route="home" class="btn btn-outline-primary px-3"><i
                                                class="bi bi-house home"><span class="d-none">Icono de
                                                    home</span></i></x-nav-link>
                                    </li>

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
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <h1 class="d-none">Minecraft Admin | {{ $title ?? '' }}</h1>
            {{$slot}}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>