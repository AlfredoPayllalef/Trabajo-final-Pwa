@extends('layouts.app')

@section('title', 'Publicaciones Internacionales')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Publicaciones Internacionales</h1>

    @if($internacionales->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($internacionales as $post)
                <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                    @if ($post->poster)
                        <img src="{{ asset($post->poster) }}" alt="Imagen" class="mb-3 rounded w-full h-40 object-cover">
                    @endif
                    <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    <a href="{{ route('category.show', $post->id) }}" class="text-blue-600 hover:underline">Leer más</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No hay publicaciones en esta categoría aún.</p>
    @endif
</div>
@endsection
