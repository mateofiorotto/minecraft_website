<?php 
    $editions = \App\Models\Edition::all();
?>

<x-layout>
    <x-slot:title>Ediciones</x-slot:title>
    <section class="container" id="ediciones">
    <h2>Ediciones</h2>
    <p>Estos son todos los juegos relacionados con <span class="fw-bold">Minecraft</span></p>

    <!-- Seran tarjetitas con cada juego que viene desde la db y luego se puede entrar a c/u -->
    <div class="row">
        
    </div>
    </section>
</x-layout>