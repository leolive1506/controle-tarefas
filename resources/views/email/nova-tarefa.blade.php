@component('mail::message')
# {{ $tarefa->tarefa }}

Data limite de conclusão {{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}

@component('mail::button', ['url' => url(route('tarefas.show', $tarefa->id))])
Ver tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent
