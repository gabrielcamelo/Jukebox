@extends('template.template')

@section('content')
    <a class="btn btn-primary" href="{{route('livro.create', $pessoa->id )}}">Cadastrar um livro</a>
    <a class="btn btn-primary" href="{{route('pessoa.index') }}">Ver pessoas</a>
    <table class="table">
        <tr>
            <th class="col-2">Nome</th>
            <th class="col-2">Categoria</th>
            <th class="col-2">Autor</th>
            <th class="col-1">Codigo</th>
            <th class="col-1">Ebook</th>
            <th class="col-1">Tamanho</th>
            <th class="col-1">Peso</th>
            <th class="col-1">ver</th>
            <th class="col-1">Editar</th>
            <th class="col-1">Deletar</th>
        </tr>
        @forelse($livros as $livro)
            <tr>
                <td>{{ $livro->nome }}</td>
                <td>{{ $livro->categoria }}</td>
                <td>{{ $livro->autor }}</td>
                <td>{{ $livro->codigo }}</td>
                <td>{{ $livro->ebook == 1 ? 'Ebook' : 'Livro físico' }}</td>
                <td>{{ $livro->tamanho_do_arquivo }}</td>
                <td>{{ $livro->peso }}</td>
                <td><a href="{{ route('livro.show', [$pessoa->id, $livro->id] ) }}" class="btn btn-info">Ver</a></td>
                <td><a href="{{ route('livro.edit', [$pessoa->id, $livro->id] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form method="POST" action="{{route('livro.destroy', [$pessoa->id, $livro->id] )}}">
                        {!! method_field('DELETE') !!}
                        @csrf
                        <button class="btn btn-danger" id="btn" type="submit" >Deletar</button>
                    </form>
                </td>
            </tr>
        @empty
            <p>Não existe livro cadastrada</p>
        @endforelse
    </table>
@stop

