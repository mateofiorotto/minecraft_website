<x-layout-admin>
    <x-slot:title>Dashboard</x-slot:title>
    <h2>Dashboard</h2>
    <p>This is the dashboard for the admin, here you can see and manage all editions, posts, categories and tags of the website.</p>

    <ul>
        <li><a href="{{ route('posts.index') }}">Posts</a></li>
        <li><a href="{{ route('editions.index') }}">Ediciones</a></li>
        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li><a href="{{ route('tags.index') }}">Etiquetas</a></li>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    </ul>
</x-layout-admin>