<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardapioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cardapio', [CardapioController::class, 'listarCardapios'])->name('cardapio.listarCardapios');
    Route::post('/cadastrar-cardapio', [CardapioController::class, 'store'])->name('cardapio.store');
    Route::delete('/excluir-cardapio/{id}', [CardapioController::class, 'destroy'])->name('cardapio.destroy');
    Route::post('/atualizar-cardapio/{id}', [CardapioController::class, 'update'])->name('cardapio.update');
    Route::get('/cardapio-aluno', [CardapioController::class, 'cardapioAluno'])->name('cardapio.cardapioAluno');

    Route::post('/agendar-cardapio', [CardapioController::class, 'agendarCardapio'])->name('cardapio.agendarCardapio');
});

    Route::get('/agendamentos', [CardapioController::class, 'agendamentos'])->name('cardapio.agendamentos');

require __DIR__.'/auth.php';
