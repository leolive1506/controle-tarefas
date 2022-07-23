<div>
    <h2 class="font-semibold text-xl leading-tight text-red-500" style="color: red">
        Titulo do pdf
    </h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>TAREFA</th>
                <th>DATA LIMITE DE CONCLUSÃO</th>
                <th>DATA DE CRIAÇÃO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
            <tr>
                <td>{{ $tarefa->id }}</td>
                <td>{{ $tarefa->user->name }}</td>
                <td>{{ $tarefa->tarefa }}</td>
                <td>{{ $tarefa->data_limite_formatada }}</td>
                <td>{{ $tarefa->created_at->format('d/m/Y H:i:s') }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

