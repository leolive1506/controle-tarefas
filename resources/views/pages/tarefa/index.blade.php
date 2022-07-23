<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listagem tarefa
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Tarefas</h1>
                        <p class="mt-2 text-sm text-gray-700">Listagem de tarefas</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="{{ route('tarefas.exportacao-dompdf') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 sm:w-auto mr-4" target="_blank">
                            Dowload DOMPDF
                        </a>
                        <a href="{{ route('tarefas.exportacao', ['extension' => 'pdf']) }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 sm:w-auto mr-4 ">
                            Dowload PDF
                        </a>
                        <a href="{{ route('tarefas.exportacao', ['extension' => 'csv']) }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 sm:w-auto mr-4 ">
                            Dowload csv
                        </a>
                        <a href="{{ route('tarefas.exportacao') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 sm:w-auto mr-4 ">
                            Dowload excel
                        </a>
                        <a href="{{ route('tarefas.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            + Tarefa
                        </a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                ID</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tarefa
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Data limite
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Ações</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($tarefas as $tarefa)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    {{ $tarefa->id }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $tarefa->tarefa }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $tarefa->dataLimiteFormatada }}
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    <form method="POST" action="{{ route('tarefas.destroy', $tarefa->id) }}" id="tarefa-delete-{{ $tarefa->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button
                                                        onclick="event.preventDefault(); document.querySelector('#tarefa-delete-{{ $tarefa->id }}').submit()"
                                                    >
                                                        Delete
                                                    </button>
                                                    <a href="{{ route('tarefas.edit', ['tarefa' => $tarefa->id]) }}" class="text-indigo-600 hover:text-indigo-900">
                                                        Edit
                                                        <span class="sr-only">, Lindsay Walton</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="p-4 border-t-2 border-t-gray-100">
                                    {{ $tarefas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
