<x-layout>
    <x-slot:title>Error 404</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="error-404">
        <img class="img-fluid" src="{{ asset('/storage/static-images/creeper-icon.webp') }}" alt="404">
        <h2 class="mt-5 text-center mb-4">No encontrado</h2>
        <p class="text-center">La pagina o recurso que estas buscando no existe</p>
        <!-- Si la ruta es /admin entonces volver al dashboard, sino al front -->
        <div class="mt-5 text-center">
            <a class="mt-5" href="{{ Request::is('admin*') ? route('dashboard') : route('home') }}">Volver</a>
        </div>
    </section>
</x-layout>