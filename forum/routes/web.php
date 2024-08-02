<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;

//Página principal
Route::get('/', [ForumController::class, 'index']);

//Form para criação de posts
Route::get('/create', [ForumController::class, 'create']);

//Controle para gravar o post no banco
Route::post('/', [ForumController::class, 'store']);

//Mostra um post específico ao passar o ID do post
Route::get('/post/{id}', [ForumController::class, 'show']);

//Form para responde a um post específico, manda o ID se uma foreign key
Route::get('/reply/{id}', [ForumController::class, 'reply']);

//Grava a resposta no banco e redireciona para o post original
Route::post('/reply/{id}', [ForumController::class, 'storeReply']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/dashboard', [ForumController::class, 'dashboard']) ->middleware('auth');