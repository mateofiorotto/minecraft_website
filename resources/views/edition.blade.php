@php
    $usuario = auth()->user();
    $ediciones = $usuario?->editions ?? collect(); //si es null, lo convierte en coleccion vacia
    $adquisicion = $ediciones->firstWhere('id', $edition->id)?->pivot;
@endphp

<x-layout>
    <x-slot:title> {{ $edition->title }} </x-slot:title>

    @if (session()->has('feedback.message'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        html: `{!! session()->get('feedback.message') !!}`,
                        background: '#533c14',
                        color: '#ffffff',
                        confirmButtonColor: '#3c9f2f',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif

    <section id="edition" class="mt-5">
        <div class="container pt-5 pb-5">
            <div class="pt-5 pb-5">
                <h2 class="text-center" data-aos="zoom-in"> {{ $edition->title }}</h2>
                <p class="text-center" data-aos="zoom-in" data-aos-delay="300">{{ $edition->subtitle }}</p>
            </div>
        </div>

        <div class="container-fluid bg-black border-bottom">
            <div class="row pt-5 pb-5 pe-5 ps-5 justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <img data-aos="fade-right" class="img-fluid" src="{{ asset('storage/' . $edition->image) }}"
                        alt="{{ $edition->title }}">
                </div>
                <div class="text-break col-lg-6 col-md-12 mb-5 mb-lg-3 ps-0 ps-lg-5 mt-lg-0 mt-4">
                    <h3 data-aos="fade-left" class="text-center text-lg-start pt-4 pb-4 pb-lg-3 pt-lg-0">¡Consigue
                        {{ $edition->title }}!</h3>
                    <p data-aos="fade-left" class="text-center text-lg-start pb-3">{{ $edition->content }}</p>
                    <p data-aos="fade-left" class="text-center text-lg-start  pb-3 fw-bold precio-edicion">$
                        {{ $edition->price }}</p>
                    @if ($adquisicion && $adquisicion->status === 'buyed')
                        <div data-aos="fade-left" class="text-center mt-3 pt-3">
                            <form action="{{ route('refund.edition', $edition->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="reembolsar-edicion-btn"
                                    onclick="this.disabled = true; this.classList.add('btn-disabled'); this.form.submit();">
                                    Reembolsar
                                </button>
                            </form>
                        </div>
                    @else
                        <div data-aos="fade-left" class="text-center mt-3 pt-3">
                            <form action="{{ route('mp.redirect', $edition->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="comprar-edicion-btn"
                                    onclick="this.disabled = true; this.classList.add('btn-disabled'); this.form.submit();">
                                    Comprar
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
</x-layout>
