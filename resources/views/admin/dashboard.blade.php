<x-layout-admin>
    <x-slot:title>Dashboard</x-slot:title>
    <section class="container pt-5" id="dashboard">
        <h2 class="mt-3 mb-0 mb-lg-5 pt-0 pt-lg-5 pb-0 pb-lg-5 text-center fw-bold">Dashboard</h2>

        <div class="pt-3 pt-lg-5 pb-2 pb-lg-5">
            <ul class="list-unstyled row lista-dashboard text-center pt-3 mt-3 pb-3 mb-3 gap-5 gap-lg-0">
                <li class="col-lg-3 col-md-12"><a href="{{ route('posts.index') }}"><i class="me-3 bi bi-newspaper"><span
                                class="d-none">Icono de posts</span></i>Posts</a></li>
                <li class="col-lg-3 col-md-12"><a href="{{ route('editions.index') }}"><i
                            class="me-3 bi bi-joystick"><span class="d-none">Icono de ediciones</span></i>Ediciones</a>
                </li>
                <li class="col-lg-3 col-md-12"><a href="{{ route('categories.index') }}"><i
                            class="me-3 bi bi-tags"><span class="d-none">Icono de categorias</span></i>Categorias</a>
                </li>
                <li class="col-lg-3 col-md-12"><a href="{{ route('users.index') }}"><i class="me-3 bi bi-people"><span
                                class="d-none">Icono de usuarios</span></i>Usuarios</a></li>
            </ul>

        </div>
        <p class="pt-3 mt-0 pt-lg-5 mt-lg-5 text-center"><a href="{{ route('home') }}">Volver a la home</a></p>
    </section>
</x-layout-admin>
