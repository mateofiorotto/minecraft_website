<!--FORM PARA CREAR POSTS-->
<x-layout-admin>
    <x-slot:title>Crear un nuevo post</x-slot:title>
    <section class="container" id="create-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Crear nuevo post</h2>


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

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título<span class="obligatorio">*</span></label>
                    <input value="{{ $errors->has('title') ? '' : old('title')  }}" type="text" name="title" id="title" class="form-control">

                    @if($errors->has('title'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('title') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo<span class="obligatorio">*</span></label>
                    <input value="{{ $errors->has('subtitle') ? '' : old('subtitle')  }}" type="text" name="subtitle" id="subtitle" class="form-control">

                    @if($errors->has('subtitle'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('subtitle') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido<span class="obligatorio">*</span></label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ $errors->has('content') ? '' : old('content') }}</textarea>

                    @if($errors->has('content'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('content') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="image" class="form-label">Imagen<span class="obligatorio">*</span></label>
                    <input type="file" name="image" id="image" class="form-control">

                    @if($errors->has('image'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('image') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="active" class="form-label">Estado<span class="obligatorio">*</span></label>
                    <select name="active" id="active" class="form-select">
                        <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Desactivado</option>
                    </select>

                    @if($errors->has('active'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('active') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="category_id" class="form-label">Categoría<span class="obligatorio">*</span></label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-3">¿No esta la categoria que buscas? <a href="{{ route('categories.create') }}">Crea
                            una</a></p>

                    @if($errors->has('category_id'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('category_id') }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary crear-crud" type="submit">Crear</button>
                </div>
            </div>
        </form>

    </section>


</x-layout-admin>
