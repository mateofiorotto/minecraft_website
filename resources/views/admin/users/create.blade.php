<!--FORM PARA CREAR POSTS-->
<x-layout-admin>
    <x-slot:title>Crear un nuevo usuario</x-slot:title>
    <section class="container" id="create-posts">
        <h2 class="mt-5 mb-5 text-center fw-bold">Crear nuevo usuario</h2>

        @if ($errors->any())
            <script>
                document.addEventListener("DOMpasswordLoaded", function() {
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

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="container mt-4 mb-5">
            @csrf
            @method('POST')

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input value="{{ $errors->has('name') ? '' : old('name')  }}" type="text" name="name" id="name" class="form-control">

                    @if($errors->has('name'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input value="{{ $errors->has('username') ? '' : old('username')  }}" type="text" name="username" id="username" class="form-control">

                    @if($errors->has('username'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('username') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">

                    @if($errors->has('password'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $errors->has('email') ? '' : old('email')  }}" type="text" name="email" id="email" class="form-control">

                    @if($errors->has('email'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="role" class="form-label">Rol</label>
                    <select name="role" id="role" class="form-select">
                        <option value="user" {{ old('role') == '0' ? 'selected' : '' }}>Usuario</option>
                        <option value="admin" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                    </select>

                    @if($errors->has('role'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('role') }}</p>
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
