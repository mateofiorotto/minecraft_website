<x-layout-admin>
    <x-slot:title>Administrar Usuarios</x-slot:title>
    <section class="container" id="index-users">

        <h2 class="mt-5 mb-5 text-center fw-bold">Administrar Usuarios</h2>

        @if (session()->has('feedback.message'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        html: `{!! session()->get('feedback.message') !!}`,
                        background: '#533c14',
                        color: '#ffffff',
                        confirmButtonColor: '#3c9f2f',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif

        <div class="text-center mt-5 mb-5">
            <a href="{{ route('users.create') }}" class="crear fw-bold btn btn-primary"><i
                    class="me-2 bi bi-plus align-middle"><span class="d-none">Icono de crear</span></i>Crear nuevo
                USUARIO</a>
        </div>

        <div class="row mb-5 d-flex align-items-center p-4 p-lg-0">
            <div class="table-responsive">
                <table class="table">
                    <!--Encabezados-->
                    <thead class="encabezados">
                        <!-- cols -->
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Usuario</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Rol</th>
                            <th class="text-center" scope="col">Ediciones compradas</th>
                            <th class="text-center"><i class="bi bi-hammer"><span class="ms-3">Acciones</span></i>
                            </th>
                        </tr>
                    </thead>

                    <!--campos-->
                    <tbody id="campos">
                        @foreach ($users as $user)
                            <tr class="campos">
                                <td class="p-3 text-center">{{ $user->id }}</td>
                                <td class="p-3 text-center">{{ $user->name }}</td>
                                <td class="p-3 text-center">{{ $user->username }}</td>
                                <td class="p-3 text-center">{{ $user->email }}</td>
                                <td class="p-3 text-center">{{ $user->role }}</td>
                                <td class="p-3 text-center">
                                    @php
                                        //solo muestra las ediciones que el usuario ha comprado, no reembolsadas
                                        $buyedEditions = $user->editions->filter(
                                            fn($edition) => $edition->pivot->status === 'buyed',
                                        );
                                    @endphp

                                    @if ($buyedEditions->count() > 0)
                                        @foreach ($buyedEditions as $edition)
                                            {{ $loop->last ? $edition->title . '.' : $edition->title . ', ' }}
                                        @endforeach
                                    @else
                                        No ha comprado ninguna edición
                                    @endif
                                </td>
                                <td class="p-3 text-center iconos-acciones">
                                    <div
                                        class="ps-5 pe-5 pt-2 pb-2 col d-flex justify-content-center gap-2 mt-2 mt-md-0">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="me-2 editar btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"><span class="d-none">Icono de
                                                    editar</span></i>
                                        </a>
                                        <a href="{{ route('users.delete', $user->id) }}"
                                            class="borrar btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"><span class="d-none">Icono de borrar</span></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="links-nav-paginacion mt-5 mb-5">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>


    </section>


</x-layout-admin>
