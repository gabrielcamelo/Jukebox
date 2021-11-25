<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoa;

use App\Http\Requests\PessoaFormRequest;

class PessoaController extends Controller
{

    private $pessoa;

    public function __construct(Pessoa $pessoa){
        $this->pessoa = $pessoa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoa->all();
        return view('pessoa.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaFormRequest $pessoa)
    {
        $dataForm = $pessoa->all();

        $insert = $this->pessoa->create($dataForm);

        if ($insert) {
            return redirect ()->route('pessoa.index');
        } else {
            return redirect ()->route('pessoa.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = $this->pessoa->find($id);
        return view('pessoa.create-edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaFormRequest $pessoa, $id)
    {
        $dataForm = $pessoa->all();
        $pessoa   = $this->pessoa->find($id);

        $update = $pessoa->update($dataForm);

        if ($update) {
            return redirect ()->route('pessoa.index');
        } else {
            return redirect ()->route('pessoa.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = $this->pessoa->find($id);

        $delete = $pessoa->delete();

        if ($delete) {
            return redirect()->route('pessoa.index');
        } else {
            return redirect()->route('pessoa.show')->with(['errors' => 'Falha ao deletar']);
        }
    }
}
