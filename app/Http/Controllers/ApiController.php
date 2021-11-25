<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livros;
use App\Http\Requests\LivroFormRequest;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function index()
    {
        $array = ['error' => ''];
        $array['list'] = Livros::all();
        return $array;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $array = ['error' => ''];

        $dataApi = $request->all();

        $livro = new Livros();
        $livro->pessoa_id = $request->input('pessoa_id');
        $livro->nome = $request->input('nome');
        $livro->categoria = $request->input('categoria');
        $livro->codigo = $request->input('codigo');
        $livro->autor = $request->input('autor');
        $livro->ebook = $request->input('ebook');
        $livro->save();

        return $array;
    }

    public function show($id)
    {
        $array = ['error' => ''];
        $array['livro'] = Livros::find($id);
        return $array;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $array = ['error' => ''];

        $livro = Livros::find($id);

        $nome      = $request->input('nome');
        $categoria = $request->input('categoria');
        $codigo    = $request->input('codigo');
        $autor     = $request->input('autor');
        $ebook     = $request->input('ebook');

        if($nome){ $livro->nome = $nome; }
        if($categoria){ $livro->categoria = $categoria; }
        if($codigo){ $livro->codigo = $codigo; }
        if($autor){ $livro->autor = $autor; }
        if($ebook){ $livro->ebook = $ebook; }

        $livro->save();

        return $array;
    }

    public function destroy($id)
    {
        $array = ['error' => ''];

        $livro = Livros::find($id);
        $livro->delete();

        return $array;
    }

    public function dbraw($pesquisa)
    {
        $array = ['error' => ''];
        $array['livro'] = DB::table('livros')
            ->select(DB::raw('count(*) as livros_count'))
            ->where('nome', 'LIKE', "%{$pesquisa}%")
            ->orWhere('categoria', 'LIKE', "%{$pesquisa}%")
            ->orWhere('codigo', 'LIKE', "%{$pesquisa}%")
            ->orWhere('autor', 'LIKE', "%{$pesquisa}%")
            ->get();
        return $array;
    }
}
