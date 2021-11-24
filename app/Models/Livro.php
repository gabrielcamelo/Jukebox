<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

	protected $fillable = ['pessoa_id', 'nome', 'categoria', 'codigo', 'autor', 'ebook', 'tamanho_do_arquivo', 'peso'];

	public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

}
