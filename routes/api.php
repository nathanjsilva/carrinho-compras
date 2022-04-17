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

Route::get('produtos/carrinho', [CarrinhoController::class, 'index']);
Route::post('inserir/produto', [CarrinhoController::class, 'store']);
Route::put('atualizar/produto/{id}', [CarrinhoController::class, 'update']);
Route::delete('deletar/produto/{id}', [CarrinhoController::class, 'destroy']);
