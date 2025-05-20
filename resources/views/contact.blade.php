<x-layout>
    <x-slot:title>Contacto</x-slot:title>
    @if (session()->has('feedback.message'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Atención!',
                    html: `{!! session()->get('feedback.message') !!}`,
                    background: '#533c14',
                    color: '#ffffff',
                    confirmButtonColor: '#3c9f2f',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif
    <section class="container pb-5 pt-5" id="contacto">
        <div class="mb-3 pb-3 pt-3 mt-3">
            <h2 class="text-center">Contacta con nosotros</h2>
            <p class="text-center">¿Tienes algun problema, duda, comentario o sugerencia? <span
                    class="fw-bold">¡Contactanos!</span></p>
            <p class="text-center">También puedes contactarnos en <a href="#footer">nuestras redes sociales</a></p>
        </div>

        <form action="{{ route('response-contact') }}" method="POST" class="container mt-4 mb-5 pb-3"
            enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <!-- Columna para el campo 'Problema' -->
                <div class="col-lg-7 col-md-10 pb-4">
                    <label for="problem" class="form-label">Problema</label>
                    <input value="{{ $errors->has('problem') ? '' : old('problem') }}" type="text" name="problem"
                        id="problem" class="form-control">

                    @if ($errors->has('problem'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('problem') }}</p>
                        </div>
                    @endif
                </div>

                <!-- Columna para el campo 'Descripción' -->
                <div class="col-lg-7 col-md-10">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $errors->has('description') ? '' : old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('description') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="text-center pt-5">
                <button type="submit" class="btn-enviar-contacto mt-4">Enviar</button>
            </div>
        </form>

    </section>
</x-layout>
