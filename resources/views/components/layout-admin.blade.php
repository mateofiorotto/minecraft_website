<!--LAYOUT BLADE-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Admin Minecraft</title>
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
              <a class="navbar-brand" href="#">Logo MC</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
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
              </div>
                {{-- Botones login --}}
                {{-- <ul>
        
                </ul> --}}
            </div>
          </nav>
    </header>

    <main>
        <h1 class="d-none">Minecraft Admin | {{ $title ?? '' }}</h1>
            {{$slot}}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
  </body>
</html>