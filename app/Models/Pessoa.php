<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'idade', 'sexo'];

    public function livros()
    {
       return $this->hasMany(Livro::class);
    }
}
