<x-layout-admin>
    <x-slot:title>Editar Etiqueta: {{ $tag->name }}</x-slot:title>
    <section class="container" id="edit-tags">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar Etiqueta</h2>
        <p class="text-center">Editaras la etiqueta: {{ $tag->name }}</p>

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

        <form action="{{ route('tags.update', $tag->id) }}" method="POST" enctype="multipart/form-data"
            class="container mt-4 mb-5">
            @csrf
            @method('PUT')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="name" class="form-label">Nombre<span class="obligatorio">*</span></label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $tag->name) }}">

                    @if ($errors->has('name'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('name') }}</p>
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
