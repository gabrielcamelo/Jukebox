@extends('template.template')

@section('content')
	@if( isset($errors) && count($errors) > 0 )
		<div class="alert alert-danger">
			@foreach( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	<a class="btn btn-primary" href="{{ route('livro.index', $pessoa->id ) }}">Voltar</a>
	@if(isset($livro))
		<form method="POST" action="{{route('livro.update', [$pessoa->id, $livro->id] )}}"  >
			{!! method_field('PUT') !!}
		<p class="h3 m-3">Editar livro</p>
	@else
		<form method="POST" action="{{route('livro.store', $pessoa->id )}}" >
		<p class="h3 m-3">Cadastrar um livro</p>
	@endif
	
		@csrf

		<div class="row m-5">
			<label class="col-lg-4 col-md-12">Nome: *
				<input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $livro->nome?? old('nome') }}" />
			</label>

			<label class="col-lg-4 col-md-12">Categoria: *
				<select name="categoria" class="form-control @error('categoria') is-invalid @enderror">
					<option value="{{ $livro->categoria?? old('categoria') }}"> {{ $livro->categoria?? old('categoria') }} </option>
					<option value="HTML"> HTM </option>
					<option value="CSS"> CSS </option>
					<option value="JavaScirpt"> JavaScirpt </option>
					<option value="PHP"> PHP </option>
					<option value="Laravel"> Laravel </option>
				</select>
			</label>

			<label class="col-lg-4 col-md-12">Código: *
				<input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ $livro->codigo?? old('codigo') }}" />
			</label>
		</div>

		<div class="row m-5">
			<label class="col-lg-4 col-md-12">Autor: *
				<input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" value="{{ $livro->autor?? old('autor') }}" />
			</label>

			<div class="col-lg-2 col-md-12">
				<label> Ebook:  <input type="checkbox" name="ebook" value="true" {{ $livro->ebook == 1 ? 'checked' : '' }} > </label>
			</div>

			<label class="col-lg-3 col-md-12" for="name">Tamanho:
				<input type="number" name="tamanho_do_arquivo" class="form-control @error('tamanho_do_arquivo') is-invalid @enderror" step="1" value="{{ $livro->tamanho_do_arquivo?? old('tamanho_do_arquivo') }}" />
			</label>

			<label class="col-lg-3 col-md-12" for="name">Peso:
				<input type="number" name="peso" class="form-control @error('peso') is-invalid @enderror" step="1" value="{{ $livro->peso?? old('peso') }}" />
			</label>
		</div>

		<input type="hidden" name="pessoa_id" value="{{$pessoa->id}}">

		<div class="row m-5">
			<button class="w-100 btn btn-primary col-12" >Cadastrar pessoa</button>
		</div>

	</form>
@stop
