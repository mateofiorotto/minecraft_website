<x-layout-admin>
    <x-slot:title>Dashboard</x-slot:title>
    <section class="container pt-5" id="dashboard">
        <h2 class="mt-5 pt-5 mb-5 text-center fw-bold">Dashboard</h2>

        <div class="pt-3 pt-5 pb-2 pb-5">
            <ul class="list-unstyled d-flex flex-column flex-lg-row justify-content-center gap-3 lista-dashboard text-center py-3">
    <li class="px-lg-4 mb-md-3 mb-lg-0"><a href="{{ route('posts.index') }}">
        <i class="me-2 bi bi-newspaper"><span class="d-none">Icono de posts</span></i>Posts
    </a></li>
    <li class="px-lg-4 mb-md-3 mb-lg-0"><a href="{{ route('editions.index') }}">
        <i class="me-2 bi bi-joystick"><span class="d-none">Icono de ediciones</span></i>Ediciones
    </a></li>
    <li class="px-lg-4 mb-md-3 mb-lg-0"><a href="{{ route('categories.index') }}">
        <i class="me-2 bi bi-bookmark-fill"><span class="d-none">Icono de categorias</span></i>Categorias
    </a></li>
    <li class="px-lg-4 mb-md-3 mb-lg-0"><a href="{{ route('tags.index') }}">
        <i class="me-2 bi bi-tags-fill"><span class="d-none">Icono de etiquetas</span></i>Etiquetas
    </a></li>
    <li class="px-lg-4 mb-md-3 mb-lg-0"><a href="{{ route('users.index') }}">
        <i class="me-2 bi bi-people-fill"><span class="d-none">Icono de usuarios</span></i>Usuarios
    </a></li>
</ul>



        </div>
        <p class="pt-3 mt-0 pt-lg-5 mt-lg-5 text-center"><a href="{{ route('home') }}">Volver a la home</a></p>
    </section>
</x-layout-admin>
