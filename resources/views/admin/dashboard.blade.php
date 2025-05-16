<x-layout-admin>
    <x-slot:title>Dashboard</x-slot:title>
    <section class="container" id="dashboard">
        <h2 class="mt-5 mb-5 pt-5 pb-5 text-center fw-bold">Dashboard</h2>

    <ul class="list-unstyled row lista-dashboard text-center pt-5 mt-5">
        <li class="col-lg-3 col-md-12"><a href="{{ route('posts.index') }}"><i class="me-3 bi bi-newspaper"><span class="d-none">Icono de posts</span></i>Posts</a></li>
        <li class="col-lg-3 col-md-12"><a href="{{ route('editions.index') }}"><i class="me-3 bi bi-joystick"><span class="d-none">Icono de ediciones</span></i>Ediciones</a></li>
        <li class="col-lg-3 col-md-12"><a href="{{ route('categories.index') }}"><i class="me-3 bi bi-tags"><span class="d-none">Icono de categorias</span></i>Categorias</a></li>
        <li class="col-lg-3 col-md-12"><a href="{{ route('users.index') }}"><i class="me-3 bi bi-people"><span class="d-none">Icono de usuarios</span></i>Usuarios</a></li>
        
    </ul>

    <p class="pt-5 mt-5 text-center"><a href="{{ route('home') }}">Volver a la home</a></p>
    </section>
</x-layout-admin>