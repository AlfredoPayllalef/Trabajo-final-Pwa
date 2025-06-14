@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">
            Bienvenidos a <span class="text-blue-500">De Mochila y Mate</span>
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Un espacio donde compartimos experiencias, anécdotas y consejos sobre viajes por el mundo.
        </p>
    </div>
    <div class="relative mb-10">
        <img src="{{ asset('imagenes/portada.jpg') }}" alt="Portada de De Mochila y Mate" class="w-full h-80 object-cover rounded-lg shadow">
    </div>


    {{-- Sección categorías destacadas --}}
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-6 text-center">Explorá nuestras categorías principales</h2>
        <div class="flex justify-center gap-8">
            <a href="{{ url('/nacionales') }}" class="block px-8 py-6 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                Viajes nacionales
            </a>
            <a href="{{ url('/internacionales') }}" class="block px-8 py-6 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                Viajes internacionales
            </a>
        </div>
    </section>

    {{-- Posts recientes --}}
    
    @if(isset($posts) && $posts->count())
        <section>
            <h2 class="text-2xl font-semibold mb-6 text-center">Posts recientes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <article class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition">
                        <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-500 mb-1">Categoría: {{ $post->category->name }}</p>
                        <p class="mb-3">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ url('/posts/' . $post->id) }}" class="text-blue-600 hover:underline">Leer más</a>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session("success") }}',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
@endif
