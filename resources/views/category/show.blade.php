@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- POST --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="border rounded-lg shadow overflow-hidden bg-white">
                @if($post->poster)
                    <img src="{{ asset($post->poster) }}" class="w-full h-80 object-cover" alt="Imagen del post">
                @endif
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-center mb-4">{{ $post->title }}</h1>
                    <p class="text-justify text-gray-800 leading-relaxed text-lg">{{ $post->content }}</p>
                    <div class="flex justify-between mt-6 text-sm text-blue-600">
                        <a href="{{ url('/home') }}" class="hover:underline">← Volver al inicio</a>
                        <a href="{{ route('category.delete', $post->id) }}">Borrar post</a>
                        <a href="{{ route('category.edit', $post->id) }}" class="hover:underline">Editar post</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="space-y-2">
            <div class="border rounded-md p-2 shadow-sm text-sm text-center bg-gray-50 mb-1">
            <h2 class="font-medium text-base">Autor</h2>
            <p class="text-gray-700">{{ $post->user->name ?? 'Anónimo' }}</p>
        </div>

        <div class="border rounded-md p-2 shadow-sm text-sm text-center bg-gray-50 mb-1">
            <h2 class="font-medium text-base">Categoría</h2>
            <p class="text-blue-600">{{ $post->category->name }}</p>
        </div>

        <div class="border rounded-md p-2 shadow-sm text-sm text-center bg-gray-50">
            <h2 class="font-medium text-base">Fecha de publicación</h2>
            <p class="text-gray-700">{{ $post->created_at->format('d/m/Y') }}</p>
        </div>


    <div class="border rounded-md p-3 shadow-sm text-sm text-center bg-white">
        <h2 class="font-medium text-base mb-1">Calificación</h2>

        @php
            $avg = round($post->averageRating() ?? 0);
        @endphp

        <div class="text-yellow-500 text-xl mb-1">
            @for($i = 1; $i <= 5; $i++)
                {{ $i <= $avg ? '★' : '☆' }}
            @endfor
        </div>

        <p class="text-xs text-gray-500 mb-2">
            Promedio: {{ number_format($post->averageRating(), 1) ?? '0.0' }}/5
        </p>

        @auth
            <form action="{{ route('ratings.store', $post->id) }}" method="POST" class="text-center">
                @csrf
                <label class="block text-xs text-gray-600 font-medium mb-1">Tu calificación:</label>

                <div class="flex flex-row-reverse justify-center space-x-reverse space-x-0.5">
                    @foreach(range(1, 5) as $i)
                        <input type="radio" name="score" value="{{ $i }}" id="star{{ $i }}" class="hidden peer" required>
                        <label for="star{{ $i }}"
                            class="text-2xl cursor-pointer text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-300 transition">
                            ★
                        </label>
                    @endforeach
                </div>

                <button type="submit"
                    class="mt-2 bg-blue-500 text-white px-3 py-1 text-sm rounded hover:bg-blue-600">
                    Calificar
                </button>
            </form>
        @else
            <p class="text-xs text-gray-400 italic mt-2">Iniciá sesión para calificar</p>
        @endauth
    </div>



        <div class="border rounded-lg p-4 shadow text-center bg-white">
            <h3 class="text-lg font-semibold mt-6">Comentarios</h3>

            @auth
                <form action="{{ route('comentarios.store', $post->id) }}" method="POST" class="mt-4">
                    @csrf
                    <textarea name="content" rows="3" class="w-full border rounded p-2" placeholder="Escribí tu comentario..." required></textarea>
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded">Comentar</button>
                </form>
            @endauth

            <div class="mt-6 text-left">
                @forelse ($post->comentarios as $comentario)
                    <div class="border rounded p-3 my-2">
                        <strong>{{ $comentario->user->name }}</strong>
                        <p>{{ $comentario->content }}</p>
                        <small class="text-gray-500">{{ $comentario->created_at->diffForHumans() }}</small>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Aún no hay comentarios</p>
                @endforelse
            </div>
        </div>
        </div>

    </div>
</div>
@endsection
