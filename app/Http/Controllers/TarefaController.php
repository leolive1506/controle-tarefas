<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(3);
        return view('pages.tarefa.index', compact('tarefas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $tarefa = Tarefa::create($data);
        Mail::to(auth()->user()->email)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefas.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('pages.tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        return view('pages.tarefa.create', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update($request->all());
        return redirect()->route('tarefas.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarefa::destroy($id);
        return redirect()->route('tarefas.index');
    }

    public function export(Request $request, $extension = 'xlsx')
    {
        $validExtenstion = [
            'xlsx', 'csv', 'pdf'
        ];

        if (!is_null(request('extension')) && in_array(request('extension'), $validExtenstion)) {
            $extension = strtolower(request('extension'));
        }

        return Excel::download(new TarefasExport, 'tarefas.' . $extension);
    }
}
