@extends('template.template')

@section('content')
    <a class="btn btn-primary" href="{{route('pessoa.create')}}">Cadastrar uma pessoa</a>
    <table class="table">
        <tr>
            <th class="col-3">Nome</th>
            <th class="col-2">Data de Nascimento</th>
            <th class="col-1">Sexo</th>
            <th class="col-1">Livros</th>
            <th class="col-1">Editar</th>
            <th class="col-1">Deletar</th>
        </tr>
        @forelse($pessoas as $pessoa)
            <tr>
                <td>{{ $pessoa->nome }}</td>
                <td>{{ $pessoa->idade }}</td>
                <td>{{ $pessoa->sexo }}</td>
                <td><a href="{{ route('livro.index', $pessoa->id ) }}" class="btn btn-info" >Ver livros</a></td>
                <td><a href="{{ route('pessoa.edit', $pessoa->id) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('pessoa.destroy', $pessoa->id)}}">
                        {!! method_field('DELETE') !!}
                        @csrf
                        <button class="btn btn-danger" id="btn" type="submit" >Deletar</button>
                    </form>
                </td>
            </tr>
        @empty
            <p>Não existe pessoa cadastrada</p>
        @endforelse
    </table>
@stop

