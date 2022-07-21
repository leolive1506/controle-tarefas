<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Visualizar tarefa {{ $tarefa->tarefa }}
        </h2>
    </x-slot>

    <x-container>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200">
                    <div class="">
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Tarefa</label>
                                <div class="mt-1">
                                    <input type="text" name="tarefa" id="tarefa" autocomplete="given-name" readonly
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ $tarefa->tarefa }}">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Data limite de conclusão</label>
                                <div class="mt-1">
                                    <input type="date" name="data_limite_conclusao" id="data_limite_conclusao" autocomplete="family-name"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ $tarefa->data_limite_conclusao }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{
                            url()->previous() != url(route(request()->route()->getName(), $tarefa->id))
                                ? url()->previous()
                                :  route('tarefas.index')
                        }}"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Voltar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
