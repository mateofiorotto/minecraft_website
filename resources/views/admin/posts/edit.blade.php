<!--FORM PARA EDITAR POSTS-->
<x-layout-admin>
    <x-slot:title>Editar Post: {{ $post->title }}</x-slot:title>
    <section class="container" id="edit-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar Post</h2>
        <p class="text-center">Editaras el post: {{ $post->title }}</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"
            class="container mt-4 mb-5">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $post->title) }}">
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                        value="{{ old('subtitle', $post->subtitle) }}">
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="active" class="form-label">Estado</label>
                    <select name="active" id="active" class="form-select">
                        <option value="1" {{ old('active', $post->active) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('active', $post->active) == 0 ? 'selected' : '' }}>Desactivado
                        </option>
                    </select>
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <p>Imagen actual:</p>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-3">¿No está la categoría que buscas? <a href="{{ route('categories.create') }}">Crea
                            una</a></p>
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary editar-post" type="submit">Editar</button>
                </div>
            </div>
        </form>

    </section>
</x-layout-admin>
