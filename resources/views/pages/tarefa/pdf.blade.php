<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            .title {
                color: red;
                text-align: center;
                text-transform: uppercase;
                margin: 2rem 0;
            }

            table {
                width: 100%;
            }

            table th {
                text-align: left
            }

            .page-break {
                page-break-after: always;
            }

        </style>
    </head>
    <body>
        <div>
            <!-- Page Heading -->
            <header>
                <div>
                    <h2 class="title">
                        Titulo do pdf
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div>
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

                <div class="page-break"></div>
                <h2>Pagina 2</h2>

            </main>
        </div>
    </body>
</html>


