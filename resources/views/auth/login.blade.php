@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-4/12">
            <img class="" src="{{ asset('img/login.jpg') }}" alt="imagen de login">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('auth.ingresar')}}" method="POST">
                @csrf
                @if (session('mensaje'))
                    <p class="text-center text-red-500">{{session('mensaje')}}</p>
                @endif
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
                    <input type="checkbox" name="remenber"> <label class="text-gray-500 text-sm" for="remenber">Recuérdame</label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="border p-2 w-full rounded-lg bg-sky-400 text-white font-bold">Iniciar sesion</button>
                </div>
            </form>
        </div>
    </div>
@endsection