@extends('layouts.app')

@section('titulo')
    Crear post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('post.imagen')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('post.store')}}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="titulo" class="mb-2">Titulo</label>
                    <input type="text" value="{{old('titulo')}}" name="titulo" id="titulo" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('titulo')
                        border-red-500
                    @enderror">
                    @error('titulo')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="mb-2">Descripcion</label>
                    <textarea type="text" name="descripcion" id="descripcion" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('descripcion')
                        border-red-500
                    @enderror"> {{old('descripcion')}} </textarea>
                    @error('descripcion')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}" id="imagen">
                    @error('imagen')
                        <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="border p-2 w-full rounded-lg bg-sky-400 text-white font-bold">Crear publicacion</button>
                </div>
            </form>
        </div>
    </div>
@endsection