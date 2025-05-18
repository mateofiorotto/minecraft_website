<x-layout>
    <x-slot:title> {{ $post->title }} </x-slot:title>
    <section class="container" id="post">
        <h2> {{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
    </section>
</x-layout>