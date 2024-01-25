@extends('plantilla.plantilla')

@section('titulo')
    Información de la Película
@endsection

@section('cabecera')
    Información de la Película
@endsection

@section('contenido')
    <div class=" mx-auto  max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded w-3/4 center" style="display: block; margin-left: auto; margin-right: auto;"
            src="{{ Storage::url($film->imagen) }}" alt="" />
        <div class="p-5">

            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <i class="fas fa-film text-gray-400"></i> Título: {{ $film->titulo }}
            </h5>
            
            <div class="flex mb-7">
                @foreach ($film->tags as $tag)
                    <div class="font-semibold py-1 px-2 rounded-full mr-1" style="background-color: {{ $tag->color }}">
                        {{ $tag->nombre }}
                    </div>
                @endforeach
            </div>
            
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <i class="fas fa-align-left text-teal-400"></i> Descripción: {{ $film->descripcion }}
            </h5>
            
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <i class="fas fa-calendar-plus text-orange-400"></i> Fecha de creación:
                {{ $film->created_at->format('d/m/Y H:i:s') }}
            </h5>
            
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <i class="fas fa-calendar-check text-yellow-400"></i> Fecha de última modificación:
                {{ $film->updated_at->format('d/m/Y H:i:s') }}
            </h5>

            <a href="{{ route('films.index') }}"
                class=" mt-2 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fas fa-home mr-2"></i> Inicio
            </a>
        </div>
    </div>
@endsection
