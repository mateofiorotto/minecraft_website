<x-layout>
    <x-slot:title>Noticias</x-slot:title>
    <section class="mb-5 mt-5 container" id="posts" data-aos="fade-down">
        <div class="pb-5 pt-5 mt-5" data-aos="fade-down">
            <h2 class="text-center">Noticias</h2>
            <p class="text-center">¡Enterate <span class="fw-bold">de los temas más relevantes</span>!</p>
        </div>

        <form action="{{ route('posts') }}" method="GET" class="d-flex flex-column gap-3">
            {{-- Buscador por texto --}}
            <div class="input-group">
                <input type="text" class="form-control" name="query"
                    placeholder="Buscar por título, subtítulo o contenido" value="{{ request('query') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>

            {{-- Selección de categoría --}}
            <div>
                <label for="category" class="form-label">Categoría</label>
                <select name="category" id="category" class="form-select" onchange="this.form.submit()">
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
            <div>
                <label class="form-label">Etiquetas</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                id="tag{{ $tag->id }}"
                                {{ collect(request('tags'))->contains($tag->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>


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
