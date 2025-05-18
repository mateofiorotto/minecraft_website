<x-layout>
    <x-slot:title>Contacto</x-slot:title>
    <section class="container" id="contacto">
         <div class="mb-3 pb-3 pt-3 mt-3">
            <h2 class="text-center">Contacta con nosotros</h2>
            <p class="text-center">¿Tienes algun problema, duda, comentario o sugerencia? <span class="fw-bold">¡Contactanos!</span></p>
            <p class="text-center">También puedes contactarnos en <a href="#footer">nuestras redes sociales</a></p>
        </div>

        <form action="{{ route('response-contact') }}" method="POST" class="container mt-4 mb-5" enctype="multipart/form-data">
            @csrf
            @method('POST')

        </form>
    </section>
</x-layout>