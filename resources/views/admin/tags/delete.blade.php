<!--CONFIRMAR ANTES DE BORRAR-->
<x-layout-admin>
    <x-slot:title>Eliminar etiqueta: {{ $tag->name }}</x-slot:title>
    <section class="container" id="delete-tags">
        <h2 class="mt-5 mb-5 text-center fw-bold">Eliminar ETIQUETA</h2>
        <p class="text-center mb-5">¿Seguro que quieres borrar la etiqueta: {{ $tag->name }}?</p>
        
        <div class="row justify-content-center align-items-center">

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
              <h3 class="fw-bold">Nombre:</h3>
              <p>{{ $tag->name }}</p>
            </div>
          
            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
              <h3 class="fw-bold">Fecha:</h3>
              <p>{{ $tag->created_at }}</p>
            </div>
        </div>


        <!-- BORRADO LOGICO, NO DE LA DB (chequear controlador) -->
        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-5 text-center">
              <button class="btn p-3 btn-danger borrar-crud" type="submit">Borrar</button>
            </div>
        </form>
    </section>
</x-layout-admin>
