@extends('plantilla.plantilla')

@section('titulo')
    Gestión de Tags
@endsection

@section('cabecera')
    Gestión de Tags
@endsection

@section('contenido')
    <div class="mx-auto w-3/4 p-8">
        <div class="my-2 flex flex-row-reverse">
            <a href="{{ route('tags.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-add"></i>
                NUEVO</a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NOMBRE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            COLOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACCIONES
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600">

                            <td class="px-6 py-4">
                                {{ $item->id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->nombre }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="p-2 rounded-xl 2-32" style="background-color: {{ $item->color }}"></div>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('tags.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('tags.edit', $item) }}"><i
                                            class="fas fa-edit text-yellow-400"></i></a>
                                    <button type="submit">
                                        <i class="fas fa-trash text-red-400 hover:text-2xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2">
            {{ $tags->links() }}
        </div>
    @endsection
