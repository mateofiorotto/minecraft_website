<x-layout>
    <x-slot:title>Iniciar Sesión</x-slot:title>

    <section class="container pb-5 pt-5" id="login">
        <h2 class="mt-5 mb-5 text-center fw-bold">Iniciar Sesión</h2>

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

        <form action="{{ route('auth.authenticate') }}" method="POST" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 col-md-10 mb-5">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="{{ old('username') }}">

                    @if ($errors->has('username'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('username') }}</p>
                        </div>
                    @endif

                </div>

                <div class="col-lg-7 col-md-10 mb-5">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">

                    @if ($errors->has('password'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif

                </div>
            </div>

            <div class="mb-5 mt-3 text-center">
                <button class="btn p-3 btn-primary" type="submit">Iniciar Sesión</button>
            </div>

</x-layout>
