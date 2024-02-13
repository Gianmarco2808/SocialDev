<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        @vite('resources/css/app.css')
        <title>RedDev - @yield('titulo')</title>
        @vite('resources/js/app.js')
        {{-- <script src="{{ asset('resources/js/app.js') }}" defer></script> --}}
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black">RedDev</a>
                @if (auth()->user())
                    <div class="flex gap-5 items-center">
                        <a href="{{route('post.index', auth()->user()->username)}}" class="text-md font-normal">Hello, {{auth()->user()->username}}</a>
                        <a  href="{{route('post.create')}}"  class="flex items-center border-none px-4 py-2 gap-1 rounded text-gray-100 bg-slate-400 hover:bg-slate-300 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                              </svg>  
                            Crear
                        </a>
                        <form action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="text-md font-semibold hover:text-red-500 border px-4 py-2 rounded">Cerrar sesion</button>
                        </form>
                    </div>
                @else
                    <nav class="flex gap-5 items-center">
                        <a href="{{route('auth.login')}}" class="text-md font-semibold hover:text-sky-600 border px-4 py-2 rounded">Login</a>
                        <a href="{{route('auth.index')}}" class="text-md font-semibold hover:text-sky-600 border px-4 py-2 rounded">Crear cuenta</a>
                    </nav>
                @endif
            </div>
        </header>

        <main class="container mx-auto mt-10">
            @yield('contenido')
        </main>

        <footer class="text-center mt-10 font-bold text-gray-500 p-5">
            RedDev - Todos los derechos reservados {{date('Y')}}
        </footer>

        @livewireScripts
        
    </body>
</html>
