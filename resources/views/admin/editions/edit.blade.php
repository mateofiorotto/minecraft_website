<x-layout-admin>
    <x-slot:title>Editar Edicion: {{ $edition->title }}</x-slot:title>
    <section class="container" id="edit-editionss">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar Edicion</h2>
        <p class="text-center">Editaras la edicion: {{ $edition->title }}</p>

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

        <form action="{{ route('editions.update', $edition->id) }}" method="POST" enctype="multipart/form-data"
            class="container mt-4 mb-5">
            @csrf
            @method('PUT')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título<span class="obligatorio">*</span></label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $edition->title) }}">

                    @if ($errors->has('title'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('title') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo<span class="obligatorio">*</span></label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                        value="{{ old('subtitle', $edition->subtitle) }}">

                    @if ($errors->has('subtitle'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('subtitle') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido<span class="obligatorio">*</span></label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ old('content', $edition->content) }}</textarea>

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
                    <label for="bestseller" class="form-label">Bestseller<span class="obligatorio">*</span></label>
                    <select name="bestseller" id="bestseller" class="form-select">
                        <option value="1" {{ old('bestseller', $edition->bestseller) == 1 ? 'selected' : '' }}>Si
                        </option>
                        <option value="0" {{ old('bestseller', $edition->bestseller) == 0 ? 'selected' : '' }}>No
                        </option>
                    </select>

                    @if ($errors->has('bestseller'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('bestseller') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <p>Imagen actual:</p>
                    @if ($edition->image)
                        <img src="{{ asset('storage/' . $edition->image) }}" alt="{{ $edition->title }}" class="mb-3 img-fluid">
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                     <label for="price" class="form-label">Precio<span class="obligatorio">*</span></label>
                    <input type="text" name="price" id="price" class="form-control"
                        value="{{ old('price', $edition->price) }}">

                    @if ($errors->has('price'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('price') }}</p>
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
