@extends('layouts.app')

@section('titulo')
    Pagina de registro
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-4/12">
            <img class="" src="{{ asset('img/register.webp') }}" alt="imagen de registro">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('auth.register')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="mb-2">Nombre</label>
                    <input type="text" value="{{old('name')}}" name="name" id="name" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('name')
                        border-red-500
                    @enderror">
                    @error('name')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" name="username" value="{{old('username')}}" id="username" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('username')
                        border-red-500
                    @enderror">
                    @error('username')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('email')
                        border-red-500
                    @enderror">
                    @error('email')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('password')
                        border-red-500
                    @enderror">
                    @error('password')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="mb-2">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50">
                </div>
                <div class="mb-3">
                    <button type="submit" class="border p-2 w-full rounded-lg bg-sky-400 text-white font-bold">Crear cuenta</button>
                </div>
            </form>
        </div>
    </div>
@endsection