@extends('plantilla.plantilla')

@section('titulo')
    Actualizar Tag
@endsection

@section('cabecera')
    Actualizar Tag
@endsection

@section('contenido')
    <div class="w-1/2 mx-auto p-6 rounded-xl shadow-xl bg-gray-600 dark:text-gray-200">
        <form method="POST" action="{{ route('tags.update', $tag) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" value="{{ old('nombre', $tag->nombre) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre..." name="nombre">
                @error('nombre')
                    <x-inputerror>{{ $message }}</x-inputerror>
                @enderror
            </div>
            <div class="mb-5">
                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                <input type="color" id="color" value="{{ old('color', $tag->color) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="color">
                @error('color')
                    <x-inputerror>{{ $message }}</x-inputerror>
                @enderror
            </div>


            <div class="flex flex-row-reverse">
                <button type="submit" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-save"></i> GUARDAR
                </button>
                <button type="reset"
                    class="mx-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-paintbrush"></i> LIMPIAR
                </button>
                <a href="{{ route('tags.index') }}"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</a>
            </div>
        </form>
    </div>
@endsection
