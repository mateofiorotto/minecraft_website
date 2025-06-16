<x-layout>
    <x-slot:title>Reembolso recibido</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="error-404" data-aos="zoom-out">
        <img class="mt-4 img-fluid" src="{{ asset('/storage/static-images/fox.webp') }}" alt="404">
        <h2 class="mt-5 text-center mb-4">Reembolsaste {{$edition->title}}</h2>
        <p class="text-break text-center">Te enviaremos información a tu correo: <span class="fw-bold">{{$user->email}}</span></p>
            <p class="text-center fw-bold pt-3">¡SENTIMOS QUE NO TE HAYA GUSTADO <i class="bi bi-emoji-frown-fill"><span class="d-none">Icono de carita triste</span></i>!</p>
        <div class="mt-5 text-center">
            <a class="mt-5" href="{{ route('home') }}">Volver</a>
        </div>
    </section>
</x-layout>