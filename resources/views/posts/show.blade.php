@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="imagen del post {{$post->titulo}}">
            <div class="p-3 flex items-center gap-3">
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>
            <div>
                <p class="font-bold">{{$post->user->username}}</p>
                <p class="text-sm text-gray-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('post.destroy', $post)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar publicacion" class="bg-red-500 hover:bg-red-600 rounded text-white font-bold mt-5 px-3 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2"> 
            <div class="shadow bg-white p-5 m-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="text-center bg-green-400 text-white my-1 py-1 rounded font-semibold">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{route('comentarios.store', ['user' => $user, 'post' => $post])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="comentario" class="mb-2">Comentario</label>
                            <textarea type="text" name="comentario" id="comentario" class="w-full mb-2 rounded-lg p-1 px-3 border bg-gray-50 @error('comentario')
                                border-red-500
                            @enderror"> </textarea>
                            @error('comentario')
                                <span class="my-2 text-sm text-red-700 p-2 text-center">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="border p-2 w-full rounded-lg bg-sky-400 text-white font-bold">Enviar comentario</button>
                        </div>
                    </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{route('post.index', $comentario->user)}}" class="font-bold">
                                    {{$comentario->user->name}}
                                </a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aun</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection