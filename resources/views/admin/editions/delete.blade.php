<!--CONFIRMAR ANTES DE BORRAR-->
<x-layout-admin>
    <x-slot:title>Eliminar edicion: {{ $edition->title }}</x-slot:title>
    <section class="container" id="delete-editions">
        <h2 class="mt-5 mb-5 text-center fw-bold">Eliminar EDICION</h2>
        <p class="text-center mb-5">¿Seguro que quieres borrar la edicion: {{ $edition->title }}?</p>
        
        <div class="row justify-content-center align-items-center">

            <div class="text-center mb-5 mt-5 col-lg-6 col-md-12 mb-3">
              <h3 class="fw-bold">Título:</h3>
              <p>{{ $edition->title }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-6 col-md-12 mb-3">
              <h3 class="fw-bold">Subtítulo:</h3>
              <p>{{ $edition->subtitle }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
              <h3 class="fw-bold">Bestseller:</h3>
              <p>{{ $edition->bestseller == 1 ? 'Si' : 'No' }}</p>
            </div>

            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
              <h3 class="fw-bold">Precio:</h3>
              <p>${{ $edition->price }}</p>
            </div>

          
            <div class="text-center mb-5 mt-5 col-lg-4 col-md-12 mb-3">
              <h3 class="fw-bold">Fecha:</h3>
              <p>{{ $edition->created_at }}</p>
            </div>

            <div class="mb-5 mt-5 col-12 text-center mb-3">
              <h3 class="fw-bold">Imagen:</h3>
              <img src="{{ asset('storage/' . $edition->image) }}" alt="{{ $edition->title }}" class="mt-3 img-fluid">
            </div>

            <div class="text-center mb-5 mt-5 col-12 mb-3">
              <h3 class="fw-bold">Contenido:</h3>
              <p class="text-break">{{ $edition->content }}</p>
            </div>
        </div>


        <!-- BORRADO LOGICO, NO DE LA DB (chequear controlador) -->
        <form action="{{ route('editions.destroy', $edition->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="mb-5 text-center">
              <button class="btn p-3 btn-danger borrar-crud" type="submit">Borrar</button>
            </div>
        </form>
    </section>
</x-layout-admin>
