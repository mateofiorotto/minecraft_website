<!--FORM PARA EDITAR POSTS-->
<x-layout-admin>
    <x-slot:title>Editar User: {{ $user->username }}</x-slot:title>
    <section class="container" id="edit-users">
        <h2 class="mt-5 mb-5 text-center fw-bold">Editar User</h2>
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6 col-md-12 mb-5">
                   <h3>Usuario</h3>
                   <p>{{ $user->username }}</p>
            </div>
            <div class="col-lg-6 col-md-12 mb-5">
                   <h3>Email</h3>
                   <p>{{ $user->email }}</p>
            </div>
        </div>
        

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

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="container mb-5">
            @csrf
            @method('PUT')

            <div class="row justify-content-center align-items-center">
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

                <div class="col-lg-6 col-md-12 mb-3">
                    <label for="role" class="form-label">Rol<span class="obligatorio">*</span></label>
                    <select name="role" id="role" class="form-select">
                        <option value="user" {{ old('role') == '0' ? 'selected' : '' }}>Usuario</option>
                        <option value="admin" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                    </select>

                    @if ($errors->has('role'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('role') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="password" class="form-label">Contraseña<span class="obligatorio">*</span></label>
                    <input type="password" name="password" id="password" class="form-control"
                        value="{{ old('password', $user->password) }}">

                    @if ($errors->has('password'))
                        <div class="mt-2 text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-12 mb-5">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña<span class="obligatorio">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        value="{{ old('password_confirmation', $user->password) }}">
                </div>

                <div class="mb-5 text-center">
                    <button class="btn p-3 btn-primary editar-crud" type="submit">Editar</button>
                </div>
            </div>
        </form>

    </section>
</x-layout-admin>
