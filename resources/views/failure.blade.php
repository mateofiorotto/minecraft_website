<x-layout>
    <x-slot:title>Compra fallida</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="error-404" data-aos="zoom-out">
        <img class="mt-4 img-fluid" src="{{ asset('/storage/static-images/cat.webp') }}" alt="404">
        <h2 class="mt-5 text-center mb-4">La compra de {{$edition->title}} falló</h2>
        <p class="text-break text-center">Reintenta de nuevo en unos minutos o cambia tu metodo de pago</p>
            <p class="text-center fw-bold pt-3">¡LO SENTIMOS!</p>
        <div class="mt-5 text-center">
            <a class="mt-5" href="{{ route('home') }}">Volver</a>
        </div>
    </section>
</x-layout>