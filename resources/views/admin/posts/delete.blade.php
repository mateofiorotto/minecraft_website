<!--CONFIRMAR ANTES DE BORRAR-->
<x-layout-admin>
    <x-slot:title>Eliminar post: {{ $post->title }}</x-slot:title>
    <section class="container" id="delete-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Eliminar POST</h2>
        <p class="text-center mb-5">¿Seguro que quieres borrar el post: {{ $post->title }}?</p>

        <div class="row justify-content-center align-items-center">

            <div class="text-center mb-5 mt-5 col-lg-6 col-md-12 mb-3">
                <h3 class="fw-bold">Título:</h3>
                <p>{{ $post->title }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-6 col-md-12 mb-3">
                <h3 class="fw-bold">Subtítulo:</h3>
                <p>{{ $post->subtitle }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Estado:</h3>
                <p>{{ $post->active == 1 ? 'Activo' : 'Desactivado' }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Categoría:</h3>
                <p>{{ $post->category->name }}</p>
            </div>


            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Fecha:</h3>
                <p>{{ $post->created_at }}</p>
            </div>

            <div class="mb-5 mt-5 col-12 text-center mb-3">
                <h3 class="fw-bold">Imagen:</h3>
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mt-3 img-fluid">
            </div>

            <div class="text-center mb-5 mt-5 col-12 mb-3">
                <h3 class="fw-bold">Contenido:</h3>
                <p class="text-break">{{ $post->content }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-12 mb-3">
                <h3 class="fw-bold">Etiquetas:</h3>
                <p class="text-break">
                    @foreach ($post->tags as $tag)
                        {{ $loop->last ? $tag->name . '.' : $tag->name . ', ' }}
                    @endforeach
                </p>
            </div>
        </div>


        <!-- BORRADO LOGICO, NO DE LA DB (chequear controlador) -->
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-5 text-center">
                <button class="btn p-3 btn-danger borrar-crud" type="submit">Borrar</button>
            </div>
        </form>
    </section>
</x-layout-admin>
