<x-layout-admin>
    <x-slot:title>Administrar Posts</x-slot:title>
    <section class="container" id="index-posts">

        <h2 class="mt-5 mb-5 text-center fw-bold">Administrar Posts</h2>

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
            <a href="{{ route('posts.create') }}" class="crear fw-bold btn btn-primary"><i
                    class="me-2 bi bi-plus align-middle"><span class="d-none">Icono de crear</span></i>Crear nuevo
                POST</a>
        </div>

        <div class="row mb-5 d-flex align-items-center p-4 p-lg-0">
            <div class="table-responsive">
                <table class="table">
                    <!--Encabezados-->
                    <thead class="encabezados">
                        <!-- cols -->
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th class="text-center" scope="col">Titulo</th>
                            <th class="text-center" scope="col">Subtitulo</th>
                            <th class="text-center" class="th-desc" scope="col">Contenido</th>
                            <th class="text-center" class="th-desc" scope="col">Imagen</th>
                            <th class="text-center" scope="col">Activo</th>
                            <th class="text-center" scope="col">Categoria</th>
                            <th class="text-center" scope="col">Etiquetas</th>
                            <th class="text-center"><i class="bi bi-hammer"><span class="ms-3">Acciones</span></i>
                            </th>
                        </tr>
                    </thead>

                    <!--campos-->
                    <tbody id="campos">
                        @foreach ($posts as $post)
                            <tr class="campos">
                                <td class="p-3 text-center">{{ $post->id }}</td>
                                <td class="p-3 text-center">{{ $post->title }}</td>
                                <td class="p-3 text-center">{{ substr($post->subtitle, 0, 50) }}... </td>
                                <td class="p-3 text-center">{{ substr($post->content, 0, 50) }}...</td>
                                <td class="p-3 text-center">{{ substr($post->image, 0, 20) }}...</td>
                                <td class="p-3 text-center">{{ $post->active == 1 ? 'Sí' : 'No' }}</td>
                                <td class="p-3 text-center">{{ $post->category->name }}</td>
                                <td class="p-3 text-center">
                                    @foreach ($post->tags as $tag)
                                        {{ $loop->last ? $tag->name . '.' : $tag->name . ', ' }}
                                    @endforeach
                                </td>
                                <td class="p-3 text-center iconos-acciones">
                                    <div
                                        class="ps-5 pe-5 pt-2 pb-2 col d-flex justify-content-center gap-2 mt-2 mt-md-0">
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="me-2 editar btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"><span class="d-none">Icono de
                                                    editar</span></i>
                                        </a>
                                        <a href="{{ route('posts.delete', $post->id) }}"
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
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>


    </section>


</x-layout-admin>
