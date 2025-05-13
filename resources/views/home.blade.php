<x-layout>
    <x-slot:title>Home</x-slot:title>
    <!--Banner con background-->
    <div id="banner"></div>
    <section class="container mt-5 mb-5 p-3" id="home">

        <section class="p-3 m-3 pb-5 pt-5">
            <h2 class="text-center">El mejor videojuego mundo abierto sandbox</h2>
            <p class="me-xl-5 ms-xl-5 me-lg-3 ms-lg-3 subtitulo-home text-center"><strong>Minecraft es un videojuego
                    sandbox</strong> enfocado en permitirle al jugador <em>explorar
                    y modificar un mundo generado dinámicamente</em> hecho de bloques de un metro cúbico.
                <img class="mt-5 mb-3" src="{{ asset('/storage/static-images/01-home.webp') }}" alt="Minecraft">
        </section>

        <!-- subseccion home: tarjetas -->
        <section class="tarjetas mb-5 mt-5 pb-5 pt-5">
            <h2 class="text-center pb-5">Esto es Minecraft</h2>
            <div class="row mb-5 mt-5">

                <!-- Izquierda: alineado a la izquierda y más arriba -->
                <div class="col-lg-5 col-md-12">
                    <img src="{{ asset('/storage/static-images/01-tarjeta.webp') }}" alt="01 - Explora el mundo"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Explora el mundo</h3>
                    <p>¡Haz de tu aventura una experiencia inolvidable! ¡Descubre cosas, haz tus construcciones,
                        encuentra recursos, nuevos biomas, lo que sea!</p>
                </div>

                <!-- Derecha: alineado a la derecha y más abajo -->
                <div class="col-lg-5 col-md-12 ms-auto tarjeta-derecha">
                    <img src="{{ asset('/storage/static-images/02-tarjeta.webp') }}" alt="02 - Descubre mobs"
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Descubre mobs</h3>
                    <p>¡En Minecraft puedes encontrarte con muchos tipos criaturas! ¡Desde adorables animales como los
                        pandas hasta monstruos escalofriantes como el Warden!</p>
                </div>

                <!-- Izquierda: alineado a la izquierda y más arriba -->
                <div class="col-lg-5 col-md-12">
                    <img src="{{ asset('/storage/static-images/01-tarjeta.webp') }}" alt="03 - "
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Explora el mundo</h3>
                    <p>¡Haz de tu aventura una experiencia inolvidable! ¡Descubre cosas, haz tus construcciones,
                        encuentra recursos, nuevos biomas, lo que sea!</p>
                </div>

                <!-- Derecha: alineado a la derecha y más abajo -->
                <div class="col-lg-5 col-md-12 ms-auto tarjeta-derecha">
                    <img src="{{ asset('/storage/static-images/02-tarjeta.webp') }}" alt="04 - "
                        class="w-100 pb-4 img-fluid">
                    <h3 class="mt-2">Descubre mobs</h3>
                    <p>¡En Minecraft puedes encontrarte con muchos tipos criaturas! ¡Desde adorables animales como los
                        pandas hasta monstruos escalofriantes como el Warden!</p>
                </div>
            </div>
        </section>

        <!--Seccion que sera algo asi:
        icono - Titulo
               parrafo..

               seran 3 filas y 2 columnas
        -->
        <section id="curiosidades" class="mb-5 mt-5">
            <h2 class="text-center pb-5">Curiosidades</h2>
            <div class="row justify-content-center align-items-center mb-5 mt-5">

                <div class="col-lg-6 col-md-12 ps-5 pe-5">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('/storage/static-images/01-curiosidades.webp') }}" alt="01 - Bloques"
                                class="w-75 pb-4 img-fluid">
                        </div>
                        <div class="col-10">
                            <h3 class="mt-2">Explora el mundo</h3>
                            <p>¡Haz de tu aventura una experiencia inolvidable! ¡Descubre cosas, haz tus construcciones,
                                encuentra recursos, nuevos biomas, lo que sea!</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 ps-5 pe-5">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('/storage/static-images/01-curiosidades.webp') }}" alt="01 - Bloques"
                                class="w-75 pb-4 img-fluid">
                        </div>
                        <div class="col-10">
                            <h3 class="mt-2">Explora el mundo</h3>
                            <p>¡Haz de tu aventura una experiencia inolvidable! ¡Descubre cosas, haz tus construcciones,
                                encuentra recursos, nuevos biomas, lo que sea!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-comprar" class="mb-5 mt-5" id="video-comprar">

        </section>

    </section>
</x-layout>
