<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Blog de Viajes')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-gray-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover shadow" />
                <span class="text-2xl font-bold text-white">De Mochila y Mate</span>
            </a>

            <ul class="flex gap-6 text-gray-200 items-center">
                <li><a href="{{ url('/') }}" class="hover:text-blue-300">Inicio</a></li>
                @auth
                    <li><a href="{{ route('misPosts') }}">Mis Posts</a></li>
                    <li><a href="{{ url('/category/create') }}" class="hover:text-blue-300">Nuevo post</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:text-red-400">Cerrar sesión</button>
                        </form>
                    </li>

                @else
                    <li><a href="{{ url('/login') }}" class="hover:text-blue-300">Iniciar sesión</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="flex-grow container mx-auto px-4 py-8 bg-white shadow-md mt-6 rounded-lg">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <div class="container mx-auto text-sm">
            © {{ date('Y') }} De Mochila y Mate — Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>