<x-layout>
    <x-slot:title>Home</x-slot:title>

    @if (session()->has('feedback.message'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        html: `{!! session()->get('feedback.message') !!}`,
                        background: '#533c14',
                        color: '#ffffff',
                        confirmButtonColor: '#3c9f2f',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif
    <!--Banner con background-->
    <div id="banner" data-aos="zoom-out"><span class="d-none">Imagen decorativa banner</span></div>
    <section class="container mt-5 mb-5 p-md-4 p-lg-3" id="home">
        <h2 class="d-none">Seccion general home</h2>

        <section class="p-lg-3 p-md-1 m-lg-3 m-md-1 pb-5 pt-5">
            <h2 class="text-center" data-aos="fade-up">El mejor videojuego mundo abierto sandbox</h2>
            <p data-aos="fade-up" class="pe-xl-5 ps-xl-5 pe-lg-3 ps-lg-3 subtitulo-home text-center"><strong>Minecraft es un videojuego
                    sandbox</strong> enfocado en permitirle al jugador <em>explorar
                    y modificar un mundo generado dinámicamente</em> hecho de bloques de un metro cúbico.
                <img data-aos="zoom-out" class="mt-5 mb-3" src="{{ asset('/storage/static-images/01-home.webp') }}" alt="Minecraft">
        </section>

        <!-- subseccion home: tarjetas -->
        <section class="tarjetas mb-0 mb-lg-5 mt-5 pb-0 pb-lg-5 pt-5">
            <h2 class="text-center pb-5" data-aos="fade-up">Esto es Minecraft</h2>
            <div class="row mb-5 mt-5">
                <!-- Izquierda: alineado a la izquierda y más arriba -->
                <div class="col-lg-5 col-md-12 tarjeta-home" data-aos="fade-right">
                    <img src="{{ asset('/storage/static-images/01-tarjeta.webp') }}" alt="01 - Explora el mundo"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Explora el mundo</h3>
                    <p>¡Haz de tu aventura una experiencia inolvidable! ¡Descubre cosas, consigue botines,
                        encuentra recursos, explora nuevos biomas, y más!</p>
                </div>

                <!-- Derecha: alineado a la derecha y más abajo -->
                <div class="col-lg-5 col-md-12 ms-lg-auto tarjeta-derecha tarjeta-home" data-aos="fade-left">
                    <img src="{{ asset('/storage/static-images/02-tarjeta.webp') }}" alt="02 - Descubre mobs"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Descubre mobs</h3>
                    <p>¡Puedes encontrarte con muchos tipos criaturas! ¡Desde adorables animales como los
                        pandas hasta monstruos escalofriantes como el Warden!</p>
                </div>

                <!-- Izquierda: alineado a la izquierda y más arriba -->
                <div class="col-lg-5 col-md-12 tarjeta-home" data-aos="fade-right">
                    <img src="{{ asset('/storage/static-images/03-tarjeta.webp') }}" alt="03 - Crea cosas"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Crea cosas</h3>
                    <p>¡Lo que te imagines, lo puedes crear! ¡Desde una simple casa pequeña a un gran castillo! ¡Tu creatividad es el limite!</p>
                </div>

                <!-- Derecha: alineado a la derecha y más abajo -->
                <div class="col-lg-5 col-md-12 ms-lg-auto ms-0 tarjeta-derecha tarjeta-home" data-aos="fade-left">
                    <img src="{{ asset('/storage/static-images/04-tarjeta.webp') }}" alt="04 - Haz amigos"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Haz amigos</h3>
                    <p>¡Entra en servidores online donde podras jugar con tus amigos o hacer nuevos! ¡Ademas tienen muchas modalidades de juego!</p>
                </div>
            </div>
        </section>

        <section id="video-comprar" class="mb-5 mt-5" id="video-comprar">
            <h2 data-aos="fade-up" class="text-center pb-5">¿Quieres jugar?</h2>
            <iframe data-aos="zoom-in" src="https://www.youtube.com/embed/NG-5L34HqOs?si=g7q1ANnMy8wHTbvr" title="Tricky Trials" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            <div data-aos="fade-up" class="text-center mt-3 mb-3 pt-5 pb-3">
                <a href="{{ route('editions') }}" class="btn-comprar-home mt-5">Comprar</a>
            </div>
        </section>

    </section>
</x-layout>
