@extends('plantilla.plantilla')
@section('titulo')
    Contacto
@endsection

@section('cabecera')
    Formulario de Contacto
@endsection

@section('contenido')
    <div class="w-1/2 mx-auto p-6 rounded-xl shadow-xl bg-gray-600 dark:text-gray-200">
        <form method="POST" action="{{ route('mail.enviar') }}">
            @csrf
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" value="{{ old('nombre') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre..." name="nombre">
                @error('nombre')
                    <x-inputerror>{{ $message }}</x-inputerror>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" id="email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example@gmail.com" name="email">
                @error('email')
                    <x-inputerror>{{ $message }}</x-inputerror>
                @enderror
            </div>

            <div class="mb-5">
                <label for="contenido"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                <textarea id="contenido" name="contenido"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Contenido...">{{ old('contenido') }}</textarea>

                @error('contenido')
                    <x-inputerror>{{ $message }}</x-inputerror>
                @enderror

            </div>

            <div class="flex flex-row-reverse">
                <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-edit"></i> ENVIAR
                </button>
                <button type="reset"
                    class="mx-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-paintbrush"></i> LIMPIAR
                </button>
                <a href="{{ route('home') }}"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark"></i> CANCELAR</a>
            </div>
        </form>
    </div>
@endsection
