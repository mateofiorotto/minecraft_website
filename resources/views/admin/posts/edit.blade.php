<?php 

$tagsIds = $post->tags->pluck('id')->all();

?>

<!--FORM PARA EDITAR POSTS-->
<x-layout-admin>
    <x-slot:title>Editar Post: {{ $post->title }}</x-slot:title>
    <section class="container" id="edit-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar Post</h2>
        <p class="text-center">Editaras el post: {{ $post->title }}</p>

        @if ($errors->any())
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        html: `Revisa los errores marcados`,
                        background: '#533c14',
                        color: '#ffffff',
                        confirmButtonColor: '#3c9f2f',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"
            class="container mt-4 mb-5">
            @csrf
            @method('PUT')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título<span class="obligatorio">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $post->title) }}">

                    @if ($errors->has('title'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('title') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo<span class="obligatorio">*</span></label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                        value="{{ old('subtitle', $post->subtitle) }}">

                    @if ($errors->has('subtitle'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('subtitle') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido<span class="obligatorio">*</span></label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>

                    @if ($errors->has('content'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('content') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="image" class="form-label">Imagen<span class="obligatorio">*</span></label>
                    <input type="file" name="image" id="image" class="form-control">

                    @if ($errors->has('image'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('image') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="active" class="form-label">Estado<span class="obligatorio">*</span></label>
                    <select name="active" id="active" class="form-select">
                        <option value="1" {{ old('active', $post->active) == 1 ? 'selected' : '' }}>Activo
                        </option>
                        <option value="0" {{ old('active', $post->active) == 0 ? 'selected' : '' }}>Desactivado
                        </option>
                    </select>

                    @if ($errors->has('active'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('active') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <p>Imagen actual:</p>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mb-3 img-fluid">
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label class="form-label fw-bold">Etiquetas</label>
                    <div class="row">
                        @foreach ($tags as $tag)
                            <div class="col-md-6 mb-2">
                                <div class="form-check d-flex align-items-center" style="word-break: break-word;">
                                    <input class="form-check-input me-2" type="checkbox" name="tags[]"
                                        value="{{ $tag->id }}" id="tag{{ $tag->id }}"
                                        {{ in_array($tag->id, old('tags', $tagsIds)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tag{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($errors->has('tags'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('tags') }}</p>
                        </div>
                    @endif

                    <p class="mt-3">¿No está la etiqueta que buscás? <a href="{{ route('tags.create') }}">Creá
                            una</a></p>
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="category_id" class="form-label">Categoría<span class="obligatorio">*</span></label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-3">¿No está la categoría que buscas? <a href="{{ route('categories.create') }}">Crea
                            una</a></p>

                    @if ($errors->has('category_id'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('category_id') }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary editar-crud" type="submit">Editar</button>
                </div>
            </div>
        </form>

    </section>
</x-layout-admin>
