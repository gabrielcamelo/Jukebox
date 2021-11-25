<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoa;
use App\Models\Livro;
use App\Http\Requests\LivroFormRequest;

class LivroController extends Controller
{

    private $pessoa;
    private $livro;

    public function __construct(Pessoa $pessoa, Livro $livro){
        $this->pessoa = $pessoa;
        $this->livro  = $livro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pessoa = $this->pessoa->find($id);
        //$livros  = $this->livro->where('pessoa_id', $pessoa->id)->get();
        $livros = Pessoa::find($id)->livros;
        return view('livro.index', compact('pessoa', 'livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pessoa = $this->pessoa->find($id);
        return view('livro.create-edit', compact('pessoa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroFormRequest $livro, $idpessoa)
    {
        $dataForm = $livro->all();

        $dataForm['ebook'] = isset($dataForm['ebook']);

        $insert = $this->livro->create($dataForm);

        if ($insert) {
            return redirect ()->route('livro.index', $idpessoa);
        } else {
            return redirect ()->route('livro.create', $idpessoa);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idpessoa, $idlivro)
    {
        $livro = $this->livro->find($idlivro);
        return view('livro.show', compact('idpessoa', 'livro')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idpessoa, $idlivro)
    {
        $pessoa = $this->pessoa->find($idpessoa);
        $livro  = $this->livro->find($idlivro);
        
        return view('livro.create-edit', compact('pessoa', 'livro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idpessoa, $idlivro, LivroFormRequest $livro)
    {
        $dataForm = $livro->all();
        $livroEncontrado  = $this->livro->find($idlivro);

        $dataForm['ebook'] = isset($dataForm['ebook']);

        $update   = $livroEncontrado->update($dataForm);

        if ($update) {
            return redirect()->route('livro.index', $idpessoa);
        } else {
            return redirect()->route('livro.edit', $idpessoa)->with(['errors' => 'Falha ao editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpessoa, $idlivro)
    {
        $livro = $this->livro->find($idlivro);

        $delete = $livro->delete();

        if ($delete) {
            return redirect()->route('livro.index', $idpessoa);
        } else {
            return redirect()->route('livro.show', $idpessoa)->with(['errors' => 'Falha ao deletar']);
        }
    }
}
