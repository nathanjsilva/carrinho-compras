<?php

use App\Http\Controllers\Core\CarrinhoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('carrinho', [CarrinhoController::class, 'index']);
Route::post('inserir_produto', [CarrinhoController::class, 'store']);
Route::put('atualizar_produto/{id}', [CarrinhoController::class, 'update']);
Route::delete('deletar_produto/{id}', [CarrinhoController::class, 'destroy']);
