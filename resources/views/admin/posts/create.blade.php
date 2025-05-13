<!--FORM PARA CREAR POSTS-->
<x-layout-admin>
    <x-slot:title>Crear un nuevo post</x-slot:title>
    <section class="container" id="create-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Crear nuevo post</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="active" class="form-label">Estado</label>
                    <select name="active" id="active" class="form-select">
                        <option value="1">Activo</option>
                        <option value="0">Desactivado</option>
                    </select>
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-3">¿No esta la categoria que buscas? <a href="{{ route('categories.create') }}">Crea
                            una</a></p>
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary crear-post" type="submit">Crear</button>
                </div>
            </div>
        </form>

    </section>


</x-layout-admin>
