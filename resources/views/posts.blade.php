<x-layout>
    <x-slot:title>Noticias</x-slot:title>
    <section class="mb-5 mt-5 container" id="posts" data-aos="fade-down">
        <div class="mb-3 pb-3 pt-3 mt-3">
            <h2 class="text-center">Noticias</h2>
            <p class="text-center">¿Te interesan las noticias de <span class="fw-bold">Minecraft</span>? ¡Miralas en este apartado!</p>
        </div>

        <section id="posteos-noticias" class="pb-3 mt-3 pt-3 mb-3 row" data-aos="zoom-out" data-aos-delay="300">
            <!-- Mostramos los post -->
            @if ($posts->isEmpty())
                <p class="text-center">No hay noticias disponibles por el momento.</p>
            @else
                @foreach ($posts as $post)
                    @if ($post->active == 1)
                    <div class="col-md-12 col-lg-4 p-4">
                        <img class="img-fluid mb-3" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->subtitle }}</p>
                        <a href="{{ route('post', $post->id) }}">Leer más</a>
                    </div>
                    @endif
                @endforeach
            @endif
        </section>
        <div class="links-nav-paginacion mt-5 mb-5">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </section>
</x-layout>
