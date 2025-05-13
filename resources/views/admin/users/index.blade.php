<x-layout-admin>
    <x-slot:title>Posts</x-slot:title>
    <section class="container" id="index-posts">
    
    <h2>Todos los posts</h2>
    <p>Index posts admin</p>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Subtitulo</th>
            <th scope="col">Categoria ID</th>
            <th scope="col">Imagen (string)</th>
            <th scope="col">Contenido (reducido)</th>
            <th scope="col">Creado / Actualizado en</th>
            <th scope="col">Activo</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->subtitle }}</td>
                <td>{{ substr($post->content, 0, 120) }}</td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->active }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->created_at }} / {{ $post->updated_at }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </section>
</x-layout-admin>