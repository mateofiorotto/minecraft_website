@php
    $usuario = auth()->user();

    $edicionesCompradas = $usuario ? $usuario->editions->where('pivot.status', 'buyed')->pluck('id')->toArray() : [];
@endphp

<x-layout>
    <x-slot:title>Perfil</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="perfil" data-aos="zoom-out">
        <h2 class="mt-5 mb-5 text-center mb-4">Perfil de Usuario</h2>
        <p class="text-break text-center"><span class="fw-bold"><strong>EMAIL: </strong>{{ $user->name }}</span></p>
        <p class="text-break text-center"><span class="fw-bold"><strong>USUARIO: </strong>{{ $user->username }}</span></p>
        <p class="text-break text-center"><span class="fw-bold"><strong>NOMBRE: </strong>{{ $user->email }}</span></p>
        <div class="pt-5 text-center">
            <a class="modificar-perfil-btn" href="{{ route('modify-profile') }}">Modificar perfil</a>
        </div>
    </section>

    <section data-aos="zoom-out" class="mis-compras pt-5">
        <h2 class="mt-5 mb-3 text-center">Mis Juegos</h2>
        <div id="ediciones-juegos" class="m-auto pt-5 container pb-5 row justify-content-center">
            @if ($editions->isEmpty())
                <p class="text-center mb-5">Todavía no compraste ningún juego.</p>
            @else
                @foreach ($editions as $edition)
                    <div class="col-md-12 col-lg-4 mb-4 animar-tarjeta positon-relative">
                        <div class="position-absolute edicion-adquirida-badge edicion-adquirida-badge-mis-juegos">
                            <span class="badge">Adquirido</span>
                        </div>

                        <a class="edicion-tarjeta" href="{{ route('edition', $edition->id) }}">
                            <img class="edicion-tarjeta-mis-juegos-img img-fluid"
                                src="{{ asset('storage/' . $edition->image) }}" alt="{{ $edition->title }}">
                            <div class="text-break contenedor-edicion-tarjeta contenedor-edicion-tarjeta-mis-juegos">
                                <h3 class="text-center">{{ $edition->title }}</h3>
                                <p class="text-center mt-4">
                                    <strong>Fecha de compra:</strong>
                                    @if ($edition->pivot->buy_date)
                                        {{ \Carbon\Carbon::parse($edition->pivot->buy_date)->format('d/m/Y') }}
                                    @else
                                        Desconocida
                                    @endif
                                </p>
                                <form action="{{ route('edition', $edition->id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="reembolsar-edicion-btn-mis-juegos">
                                        Reembolsar
                                    </button>
                                </form>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>
