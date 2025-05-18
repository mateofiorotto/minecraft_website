<x-layout-admin>
    <x-slot:title>Crear una nueva edicion</x-slot:title>
    <section class="container" id="create-editions">
        <h2 class="mt-5 mb-5 text-center fw-bold">Crear nueva edicion</h2>


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

        <form action="{{ route('editions.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input value="{{ $errors->has('title') ? '' : old('title')  }}" type="text" name="title" id="title" class="form-control">

                    @if($errors->has('title'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('title') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="subtitle" class="form-label">Subtítulo</label>
                    <input value="{{ $errors->has('subtitle') ? '' : old('subtitle')  }}" type="text" name="subtitle" id="subtitle" class="form-control">

                    @if($errors->has('subtitle'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('subtitle') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-12 mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea name="content" id="content" rows="5" class="form-control">{{ $errors->has('content') ? '' : old('content') }}</textarea>

                    @if($errors->has('content'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('content') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" name="image" id="image" class="form-control">

                    @if($errors->has('image'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('image') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="bestseller" class="form-label">Bestseller</label>
                    <select name="bestseller" id="bestseller" class="form-select">
                        <option value="1" {{ old('bestseller') == '1' ? 'selected' : '' }}>Si</option>
                        <option value="0" {{ old('bestseller') == '0' ? 'selected' : '' }}>No</option>
                    </select>

                    @if($errors->has('bestseller'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('bestseller') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="price" class="form-label">Precio</label>
                    <input value="{{ $errors->has('price') ? '' : old('price')  }}" type="text" name="price" id="price" class="form-control">

                    @if($errors->has('price'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('price') }}</p>
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
