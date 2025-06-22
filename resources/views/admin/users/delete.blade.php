<!--CONFIRMAR ANTES DE BORRAR-->
<x-layout-admin>
    <x-slot:title>Eliminar usuario: {{ $user->username }}</x-slot:title>
    <section class="container" id="delete-users">
        <h2 class="mt-5 mb-5 text-center fw-bold">Eliminar USUARIO</h2>
        <p class="text-center mb-5">¿Seguro que quieres borrar el usuario: {{ $user->username }}?</p>

        <div class="row justify-content-center align-items-center">

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Nombre:</h3>
                <p>{{ $user->name }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Usuario:</h3>
                <p>{{ $user->username }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Email:</h3>
                <p>{{ $user->email }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Rol</h3>
                <p>{{ $user->role }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Ediciones compradas:</h3>

                <p>
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
                </p>
                    </td>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
                <h3 class="fw-bold">Fecha:</h3>
                <p>{{ $user->created_at }}</p>
            </div>

        </div>


        <!-- BORRADO LOGICO, NO DE LA DB (chequear controlador) -->
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-5 text-center">
                <button class="btn p-3 btn-danger borrar-crud" type="submit">Borrar</button>
            </div>
        </form>
    </section>
</x-layout-admin>
