@php
    $usuario = auth()->user();
    $edicionesCompradas = $usuario && $usuario->editions
        ? $usuario->editions
            ->filter(fn($e) => $e->pivot->status === 'buyed')
            ->pluck('id')
            ->toArray()
        : [];
@endphp

<x-layout>
    <x-slot:title>Ediciones</x-slot:title>
    <section class="mb-5 mt-5 container" id="ediciones">
        <div class="pb-5 pt-5 mt-5" data-aos="fade-down">
            <h2 class="text-center">Ediciones</h2>
            <p class="text-center">¡Estos son <span class="fw-bold">nuestros juegos</span>! ¡No te quedes sin probar la
                experiencia!</p>
        </div>

        <!-- Seran tarjetitas con cada juego que viene desde la db y luego se puede entrar a c/u -->
        <section id="ediciones-juegos" class="p-3 pb-5 row justify-content-center" data-aos="zoom-out"
            data-aos-delay="300">
            @if ($editions->isEmpty())
                <p class="text-center">No hay ediciones disponibles por el momento.</p>
            @else
                @foreach ($editions as $edition)
                    <div class="col-md-12 col-lg-4 mb-4 animar-tarjeta positon-relative {{ $edition->bestseller == 1 ? 'bestseller' : '' }}">
                        @php
                            //asignar a una variable si el usuario tiene la edicion comprada
                            $comprado = in_array($edition->id, $edicionesCompradas);
                        @endphp
                        <div>
                            @if ($comprado)
                            <!--Si esta comprado le asignamos una "etiqueta" o badge-->
                                <div class="position-absolute edicion-adquirida-badge">
                                    <span class="badge">Adquirido</span>
                                </div>
                            @endif
                        </div>
                        <a class="edicion-tarjeta" href="{{ route('edition', $edition->id) }}">
                            <img class="img-fluid" src="{{ asset('storage/' . $edition->image) }}"
                                alt="{{ $edition->title }}">
                            <div class="text-break contenedor-edicion-tarjeta">
                                <h3>{{ $edition->title }}</h3>
                                <p class="fw-bold precio">$ {{ $edition->price }}</p>
                                <p>{{ $edition->subtitle }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </section>
    </section>
</x-layout>
