<x-layout>
    <x-slot:title>Perfil</x-slot:title>
    <section class="mb-5 mt-5 p-5 container" id="perfil" data-aos="zoom-out">
        <h2 class="mt-5 mb-5 text-center mb-4">Perfil de Usuario</h2>
        <p class="text-break text-center"><span class="fw-bold"><strong>EMAIL: </strong>{{$user->name}}</span></p>
        <p class="text-break text-center"><span class="fw-bold"><strong>USUARIO: </strong>{{$user->username}}</span></p>
        <p class="text-break text-center"><span class="fw-bold"><strong>NOMBRE: </strong>{{$user->email}}</span></p>
        <div class="pt-5 text-center">
            <a class="modificar-perfil-btn" href="{{ route('modify-profile') }}">Modificar perfil</a>
        </div>
    </section>
</x-layout>