<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
	ApiController,
};


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', function(){
	return [
		'pong' => true
	];
});

Route::get('livros', [ApiController::class, 'index']);
Route::get('livros/{id}', [ApiController::class, 'show']);
Route::post('livros', [ApiController::class, 'store']);
Route::put('livros/{id}', [ApiController::class, 'update']);
Route::delete('livros/{id}', [ApiController::class,'destroy']);

Route::get('pesquisa/{pesquisa}', [ApiController::class, 'dbraw']);
