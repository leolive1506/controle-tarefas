<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('tarefas/exportacao', [TarefaController::class, 'export'])->name('tarefas.exportacao');
    Route::get('tarefas/exportacao-dompdf', [TarefaController::class, 'exportDomPdf'])->name('tarefas.exportacao-dompdf');
    Route::resource('tarefas', TarefaController::class);
});

Route::get('mensagem-teste', function () {
    // return new \App\Mail\MensagemTesteMail();
    Mail::to('leonardo.santana@paylivre.com')->send(new \App\Mail\MensagemTesteMail());
    return "enviado";
})->name('teste');

Route::get('teste', fn () => view('welcome2'));

require __DIR__.'/auth.php';
