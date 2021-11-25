<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
	PessoaController,
	LivroController,
};

Route::get('/', function () {
    return redirect('pessoa');
});

Route::resource('pessoa', PessoaController::class);

Route::group(['prefix' => 'pessoa/{idpessoa}'], function($idpessoa){
    Route::resource('livro', LivroController::class);
});
