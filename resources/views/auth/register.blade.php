<x-layout>
    <x-slot:title>Registrarse</x-slot:title>

    <section class="container pb-5 pt-5" id="register">
        <h2 class="mt-5 mb-5 text-center fw-bold">Registrarse</h2>

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

        <form action="{{ route('auth.createNewUser') }}" method="POST" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">

                <div class="col-lg-6 col-md-10 mb-5">
                    <label for="name" class="form-label">Nombre<span class="obligatorio">*</span></label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif

                </div>
                <div class="col-lg-6 col-md-10 mb-5">
                    <label for="username" class="form-label">Usuario<span class="obligatorio">*</span></label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="{{ old('username') }}">

                    @if ($errors->has('username'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('username') }}</p>
                        </div>
                    @endif

                </div>

                <div class="col-lg-6 col-md-10 mb-5">
                    <label for="password" class="form-label">Contraseña<span class="obligatorio">*</span></label>
                    <input type="password" name="password" id="password" class="form-control">

                    @if ($errors->has('password'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-10 mb-5">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña<span class="obligatorio">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        value="{{ old('password_confirmation') }}">
                </div>

                <div class="col-lg-6 col-md-10 mb-5">
                    <label for="email" class="form-label">Email<span class="obligatorio">*</span></label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                </div>
            </div>
            

            <div class="mb-5 mt-3 text-center">
                <button class="btn p-3 btn-primary" type="submit">Registrarse</button>
            </div>

</x-layout>
