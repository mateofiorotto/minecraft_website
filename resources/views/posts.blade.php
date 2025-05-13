<x-layout>
    <x-slot:title>Posts</x-slot:title>
    <section class="mb-5 mt-5 container" id="posts">
        <section class="mb-3 pb-3 pt-3 mt-3">
            <h2>Posts</h2>
            <p>¿Te interesan las noticias de <span class="fw-bold">Minecraft</span>? ¡Miralas en este apartado!</p>
        </section>

        <section id="posteos-noticias" class="pb-3 mt-3 pt-3 mb-3 row">
            <!-- Mostramos los post -->
            @if ($posts->isEmpty())
                <p>No hay posts disponibles por el momento.</p>
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
    </section>
</x-layout>
