@extends('layouts.app')

@section('title', 'Mis Posts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Mis Posts</h1>
     @if($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500 mb-1">Categoría: {{ $post->category->name }}</p>
                    <p class="mb-3">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                    <a href="{{ route('category.show', $post->id) }}" class="text-blue-600 hover:underline">Leer más</a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No tenés publicaciones todavía.</p>
    @endif
</div>
@endsection
