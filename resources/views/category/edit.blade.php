@extends('layouts.app')

@section('title', 'Editar Post')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Editar Post</h2>

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Título --}}
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        {{-- Imagen actual --}}
        @if ($post->poster)
            <div>
                <label class="block text-gray-700 font-medium mb-2">Imagen actual</label>
                <img src="{{ asset($post->poster) }}" alt="Imagen actual" class="w-48 rounded shadow mb-2">
            </div>
        @endif

        {{-- Poster --}}
        <div>
            <label for="poster" class="block text-gray-700 font-medium mb-2">Nueva imagen (opcional)</label>
            <input type="file" name="poster" id="poster" accept="image/*" class="block w-full text-sm text-gray-700">
        </div>

        {{-- Contenido --}}
        <div>
            <label for="content" class="block text-gray-700 font-medium mb-2">Contenido</label>
            <textarea name="content" id="content" rows="5" required
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500">{{ old('content', $post->content) }}</textarea>
        </div>

        {{-- Categoría --}}
        <div>
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Categoría</label>
            <select name="category_id" id="category_id"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $post->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Habilitado --}}
        <div class="flex items-center">
            <input type="checkbox" name="habilitated" id="habilitated" value="1"
                   class="mr-2" {{ $post->habilitated ? 'checked' : '' }}>
            <label for="habilitated" class="text-gray-700">¿Mostrar post?</label>
        </div>

        {{-- Botón --}}
        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Actualizar Post
            </button>
        </div>
    </form>
</div>
@endsection
