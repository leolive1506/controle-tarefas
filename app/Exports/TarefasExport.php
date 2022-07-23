<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tarefa::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
    }

    // precisa definir retorno nesse metodo
    public function headings(): array
    {
        return ['ID', 'USER ID', 'TAREFA', 'DATA LIMITE CONCLUSÃO', 'DATA CRIAÇÃO', 'DATA ATUALIÇÃO'];
    }

    // manipualando dados
    public function map($tarefa): array
    {
        return [
            $tarefa->id,
            '#' . $tarefa->user_id . ' ' . $tarefa->user->name,
            $tarefa->tarefa,
            $tarefa->data_limite_formatada,
            $tarefa->created_at->format('d/m/Y H:i:s'),
            $tarefa->updated_at->format('d/m/Y H:i:s')
        ];
    }
}
