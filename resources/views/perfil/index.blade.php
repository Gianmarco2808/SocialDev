@extends('layouts.app')

@section('titulo')
    Editar perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('pefil.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" name="username" value="{{ auth()->user()->username }}" id="username" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('username')
                        border-red-500
                    @enderror">
                    @error('username')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imagen" class="mb-2">Imagen de perfil</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="imagen" id="imagen" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('imagen')
                        border-red-500
                    @enderror">
                    @error('imagen')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="border p-2 w-full rounded-lg bg-sky-400 text-white font-bold">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
@endsection