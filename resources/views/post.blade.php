<x-layout>
    <x-slot:title> {{ $post->title }} </x-slot:title>
    <section class="pb-5 border-top" id="post">
        <div class="pt-5 pb-5 bg-black contenedor-post">
            <div data-aos="zoom-in" class="text-break container">
                <h2> {{ $post->title }}</h2>
                <p class="pb-3 fw-bold"><i class="bi bi-bookmark-fill me-2"><span class="d-none">Icono
                            categorias</span></i>{{ $post->category->name }}</p>
                           
                {{-- El ultimo termina con . --}}
                <p class="pb-3"><i class="bi bi-tags-fill me-2"><span class="d-none">Icono
                            etiquetas</span></i>
                    @foreach ($post->tags as $tag)
                        {{ $loop->last ? $tag->name . '.' : $tag->name . ', ' }}
                    @endforeach
                </p>
                <p>{{ $post->subtitle }}</p>
            </div>
        </div>

        <div data-aos="zoom-in" data-aos-delay="250" class="text-break container pt-5 pb-5 contenedor-post">
            <p class="post-contenido">{{ $post->content }}</p>
            <img  class="mt-5" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        </div>
    </section>
</x-layout>
