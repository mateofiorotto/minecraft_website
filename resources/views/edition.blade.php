<x-layout>
    <x-slot:title> {{ $edition->title }} </x-slot:title>
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
                    <img data-aos="fade-right" class="img-fluid" src="{{ asset('storage/' . $edition->image) }}" alt="{{ $edition->title }}">
                </div>
                <div class="text-break col-lg-6 col-md-12 mb-5 mb-lg-3 ps-0 ps-lg-5 mt-lg-0 mt-4">
                    <h3 data-aos="fade-left" class="text-center text-lg-start pt-4 pb-4 pb-lg-3 pt-lg-0">¡Consigue {{ $edition->title }}!</h3>
                    <p data-aos="fade-left" class="text-center text-lg-start pb-3">{{ $edition->content }}</p>
                    <p data-aos="fade-left" class="text-center text-lg-start  pb-3 fw-bold precio-edicion">$ {{ $edition->price }}</p>
                    <div data-aos="fade-left" class="text-center mt-3 pt-3">
                        <a class="comprar-edicion-btn" href="#">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</x-layout>
