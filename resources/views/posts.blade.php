<x-layout>
    <x-slot:title>Noticias</x-slot:title>
    <section class="mb-5 mt-5 container" id="posts" data-aos="fade-down">
        <div class="mb-3 pb-2 pt-5 mt-3">
            <h2 class="text-center">Noticias</h2>
            <p class="text-center">¿Te interesan las noticias de <span class="fw-bold">Minecraft</span>? ¡Miralas en este
                apartado!</p>
        </div>

        <!-- Filtrar x post SELECT -->
        <form method="GET" action="{{ route('posts') }}">
            <div class="filtrar-categoria d-block m-auto">
                <select name="category" id="category" class="form-select" aria-label="Default select example"
                    onchange="this.form.submit()">
                    <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>Todos</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <section id="posteos-noticias" class="pb-3 mt-3 pt-3 mb-3 row justify-content-center" data-aos="zoom-out"
            data-aos-delay="300">
            <!-- Mostramos los post -->
            @if ($posts->isEmpty())
                <p class="text-center mt-5 mb-5">No hay noticias disponibles por el momento.</p>
            @else
                @foreach ($posts as $post)
                    @if ($post->active == 1)
                        <div data-aos="fade-out" class="col-md-12 col-lg-4 p-4 animar-tarjeta">
                            <a class="posteo-tarjeta" href="{{ route('post', $post->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                                <div class="text-break contenedor-posteo-tarjeta">
                                    <h3>{{ $post->title }}</h3>
                                    <p>{{ $post->subtitle }}</p>
                            </a>
                        </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>
        <div class="links-nav-paginacion mt-5 mb-5">
            {{ $posts->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </section>
</x-layout>
