<x-layout-admin>
    <x-slot:title>Crear una nueva categoria</x-slot:title>
    <section class="container" id="create-categories">
        <h2 class="mt-5 mb-5 text-center fw-bold">Crear nueva categoria</h2>


        @if ($errors->any())
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'error',
                        name: '¡Error!',
                        html: `Revisa los errores marcados`,
                         background: '#533c14',
                        color: '#ffffff',
                        confirmButtonColor: '#3c9f2f',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="name" class="form-label">Nombre<span class="obligatorio">*</span></label>
                    <input value="{{ $errors->has('name') ? '' : old('name')  }}" type="text" name="name" id="name" class="form-control">

                    @if($errors->has('name'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('name') }}</p>
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
