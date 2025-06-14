@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8 text-center"> Perfil de Usuario</h2>

        {{-- Información del perfil --}}
        <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-md mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">📝 Información del perfil</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Cambio de contraseña --}}
        <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-md mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">🔒 Cambiar contraseña</h3>
            @include('profile.partials.update-password-form')
        </div>

        
    </div>
@endsection
