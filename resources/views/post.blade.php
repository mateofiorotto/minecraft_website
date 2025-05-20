<x-layout>
    <x-slot:title> {{ $post->title }} </x-slot:title>
    <section class="pb-5 border-top" id="post">
        <div class="pt-5 pb-5 bg-black contenedor-post">
            <div class="text-break container">
                <h2> {{ $post->title }}</h2>
                <p class="pb-3 fw-bold"><i class="bi bi-bookmark-fill me-2"><span class="d-none">Icono
                            categorias</span></i>{{ $post->category->name }}</p>
                <p>{{ $post->subtitle }}</p> <!--Esto tendra un font size mayor-->
            </div>
        </div>

        <div class="text-break container pt-5 pb-5 contenedor-post">
            <p class="post-contenido">{{ $post->content }}</p>
            <img class="mt-5" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        </div>
    </section>
</x-layout>
