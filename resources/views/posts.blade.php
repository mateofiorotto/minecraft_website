<x-layout>
    <x-slot:title>Noticias</x-slot:title>
    <section class="mb-5 mt-5 container" id="posts" data-aos="fade-down">
        <div class="pb-4 pt-5 mt-5" data-aos="fade-down">
            <h2 class="text-center">Noticias</h2>
            <p class="text-center">¡Enterate <span class="fw-bold">de los temas más relevantes</span>!</p>
        </div>

        <button class="btn btn-filtrar-noticias mb-4" onclick="abrirModalFiltro()"><i class="bi bi-funnel-fill me-2"><span class="d-none">Icono de filtrar</span></i>Filtrar posts</button>

        <section id="posteos-noticias" class="pb-3 mt-3 pt-3 mb-3 row justify-content-center" data-aos="zoom-out"
            data-aos-delay="300">
            <!-- Mostramos los post -->
            @if ($posts->isEmpty())
                <p class="text-center mt-5 mb-5">No hay noticias disponibles por el momento.</p>
            @else
                @foreach ($posts as $post)
                    @if ($post->active == 1)
                        <div class="col-md-12 col-lg-4 p-4 animar-tarjeta">
                            <a class="posteo-tarjeta" href="{{ route('post', $post->id) }}">
                                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->title }}">
                                <div class="text-break contenedor-posteo-tarjeta">
                                    <h3>{{ $post->title }}</h3>
                                    <p>{{ $post->subtitle }}</p>
                            </a>
                        </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </section>
        <div class="links-nav-paginacion mt-5 mb-5">
            {{ $posts->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </section>
</x-layout>

<script>
    function abrirModalFiltro() {
        Swal.fire({
            title: 'Filtrar noticias',
            html: `
            <div class="modal-filtros">
            <form action="{{ route('posts') }}" method="GET" class="justify-content-center align-items-center">
            
            {{-- Buscador por texto --}}
             <div class="busqueda m-auto pb-4">
                <label for="query" class="text-center form-label mb-3">Buscar</label>
                <input type="text" class="form-control d-block" name="query"
                    placeholder="Buscar por título, subtítulo o contenido" value="{{ request('query') }}">
                
            </div>

            {{-- Selección de categoría --}}
            <div class="seleccion-categoria pb-4">
                <label for="category" class="form-label mb-3">Categoría</label>
                <select name="category" id="category" class="form-select">
                    <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>Todas</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro por etiquetas (checkboxes), filtra las que coincidan que tengan TODAS las seleccionadas --}}
            <div class="seleccionar-etiquetas">
                <label class="form-label mb-3">Etiquetas</label>
                <div class="d-flex flex-wrap gap-4 align-items-center justify-content-center">
                    @foreach ($tags as $tag)
                        <div class="form-check d-flex align-items-center">
                            <input class="me-2 form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                id="tag{{ $tag->id }}"
                                {{ collect(request('tags'))->contains($tag->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
             </div>
             <button type="submit" class="btn-filtrar-posteos-modal btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
        </form>
        </div>
            `,
            showCloseButton: true,
            showConfirmButton: false,
            width: '60%',
            didOpen: () => {
                const form = document.getElementById('modal-form');
                const categorySelect = form.querySelector('#category');
                categorySelect.addEventListener('change', () => form.submit());
            }
        });
    }
</script>
