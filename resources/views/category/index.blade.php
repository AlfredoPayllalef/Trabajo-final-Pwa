@extends('layouts.app')

@section('content')
    <h2>Listado de posts</h2>

    @foreach($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
            <a href="{{ route('category.show', $post->id) }}">Ver más</a>
        </div>
    @endforeach
@endsection
