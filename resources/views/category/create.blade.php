@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-8">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear nuevo post</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Título --}}
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Título del post</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required>
        </div>

        {{-- Poster --}}
        <div>
            <label for="poster" class="block text-gray-700 font-medium mb-2">Imagen de portada (opcional)</label>
            <input type="file" name="poster" id="poster" accept="image/*" class="block w-full text-sm text-gray-700">
        </div>

        {{-- Contenido --}}
        <div>
            <label for="content" class="block text-gray-700 font-medium mb-2">Contenido</label>
            <textarea name="content" id="content" rows="5" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required></textarea>
        </div>

        {{-- Categoría --}}
        <div>
            <label for="category_id" class="block text-gray-700 font-medium mb-2">Categoría</label>
            <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500" required>
                <option disabled selected>Selecciona una categoría</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Habilitado --}}
        <div class="flex items-center">
            <input type="checkbox" name="habilitated" id="habilitated" class="mr-2">
            <label for="habilitated" class="text-gray-700">¿Publicar inmediatamente?</label>
        </div>

        {{-- Botón --}}
        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Guardar Post</button>
        </div>
    </form>
</div>
@endsection
