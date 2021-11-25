@extends('template.template')

@section('content')
	<a class="btn btn-primary" href="{{ route('livro.index', $idpessoa ) }}">Voltar</a>

	<div class="row m-5">
		<label class="col-lg-4 col-md-12">Nome:
			<input type="text" name="nome" class="form-control" value="{{ $livro->nome }}" readonly />
		</label>

		<label class="col-lg-4 col-md-12">Categoria:
			<input type="text" name="nome" class="form-control" value="{{ $livro->categoria }}" readonly />
		</label>

		<label class="col-lg-4 col-md-12">Código:
			<input type="text" name="codigo" class="form-control" value="{{ $livro->codigo }}" readonly />
		</label>
	</div>

	<div class="row m-5">
		<label class="col-lg-4 col-md-12">Autor:
			<input type="text" name="autor" class="form-control" value="{{ $livro->autor }}" readonly />
		</label>

		<label class="col-lg-2 col-md-12">Ebook / Livro físico
			<input type="text" name="codigo" class="form-control" value="{{ $livro->ebook == 1 ? 'Ebook' : 'Livro físico' }}" readonly />
		</label>

		<label class="col-lg-3 col-md-12" for="name">Tamanho:
			<input type="number" name="tamanho_do_arquivo" class="form-control" step="1" value="{{ $livro->tamanho_do_arquivo }}" readonly />
		</label>

		<label class="col-lg-3 col-md-12" for="name">Peso:
			<input type="number" name="peso" class="form-control" step="1" value="{{ $livro->peso }}" readonly />
		</label>
	</div>


@stop
