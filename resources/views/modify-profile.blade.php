<!--FORM PARA EDITAR POSTS-->
<x-layout-admin>
    <x-slot:title>Editar Usuario: {{ $user->username }}</x-slot:title>
    <section class="container" id="edit-users">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar perfil</h2>        

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

        <form action="{{ route('modify.profile', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="container mb-5">
            @csrf
            @method('PUT')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="username" class="form-label">Usuario<span class="obligatorio">*</span></label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="{{ old('username', $user->username) }}">

                    @if ($errors->has('usernamename'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('username') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="name" class="form-label">Nombre<span class="obligatorio">*</span></label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $user->name) }}">

                    @if ($errors->has('name'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 mb-3">
                    <label for="email" class="form-label">Email<span class="obligatorio">*</span></label>
                    <input type="text" name="email" id="email" class="form-control"
                        value="{{ old('email', $user->email) }}">

                    @if ($errors->has('email'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">

                    @if ($errors->has('password'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary editar-crud" type="submit">Editar</button>
                </div>
            </div>
        </form>

    </section>
</x-layout-admin>
