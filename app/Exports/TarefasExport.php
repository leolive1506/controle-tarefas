<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
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
}
