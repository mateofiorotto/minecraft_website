<x-layout>
    <x-slot:title>Ediciones</x-slot:title>
    <section class="mb-5 mt-5 container" id="ediciones">
        <div class="mb-3 pb-5 pt-3 mt-3" data-aos="fade-down">
            <h2 class="text-center">Ediciones</h2>
            <p class="text-center">¡Estos son <span class="fw-bold">nuestros juegos</span>! ¡No te quedes sin probar la experiencia!</p>
        </div>

    <!-- Seran tarjetitas con cada juego que viene desde la db y luego se puede entrar a c/u -->
    <section id="posteos-noticias" class="pb-3 mt-3 pt-3 mb-3 row" data-aos="zoom-out" data-aos-delay="300">
            @if ($editions->isEmpty())
                <p class="text-center">No hay ediciones disponibles por el momento.</p>
            @else
                @foreach ($editions as $edition)
                    <div class="col-md-12 col-lg-4">
                        <img class="img-fluid mb-3" src="{{ asset('storage/' . $edition->image) }}" alt="{{ $edition->title }}">
                        <h3>{{ $edition->title }}</h3>
                        <p>{{ $edition->subtitle }}</p>
                        <a href="{{ route('post', $edition->id) }}">Leer más</a>
                    </div>
                @endforeach
            @endif
        </section>
    </section>
</x-layout>