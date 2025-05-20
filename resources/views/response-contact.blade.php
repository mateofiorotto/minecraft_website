<x-layout>
    <x-slot:title>Error 404</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="error-404" data-aos="zoom-out">
        <img class="mt-4 img-fluid" src="{{ asset('/storage/static-images/fox.webp') }}" alt="404">
        <h2 class="mt-5 text-center mb-4">Su mensaje ha sido recibido</h2>
        <p class="text-center">Nos contactaremos al correo <span class="fw-bold">{{$user->email}}</span></p>
            <p class="text-center fw-bold pt-3">¡GRACIAS!</p>
        <div class="mt-5 text-center">
            <a class="mt-5" href="{{ route('home') }}">Volver</a>
        </div>
    </section>
</x-layout>