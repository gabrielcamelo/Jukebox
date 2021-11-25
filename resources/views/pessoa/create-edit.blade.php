@extends('template.template')

@section('content')
	@if( isset($errors) && count($errors) > 0 )
		<div class="alert alert-danger">
			@foreach( $errors->all() as $error )
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	@if(isset($pessoa))
		<form method="POST" action="{{route('pessoa.update', $pessoa->id)}}" >
			{!! method_field('PUT') !!}
		<p class="h3 m-3">Editar uma pessoa</p>
	@else
		<form method="POST" action="{{route('pessoa.store')}}" >
		<p class="h3 m-3">Cadastrar uma pessoa</p>
	@endif
	
		@csrf

		<div class="row m-5">
			<label class="col-lg-4 col-md-12">Nome: *
				<input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ $pessoa->nome?? old('nome') }}" />
			</label>

			<label class="col-lg-4 col-md-12">Data de Nascimento: *
				<input type="date" name="idade" class="form-control @error('idade') is-invalid @enderror" value="{{ $pessoa->idade?? old('idade') }}" />
			</label>

			<label class="col-lg-4 col-md-12">Sexo: *
				<select name="sexo" class="form-control @error('sexo') is-invalid @enderror">
					<option value="{{ $pessoa->sexo?? old('sexo') }}">  </option>
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</label>
		</div>

		<div class="row m-5">
			<button class="w-100 btn btn-primary col-12" >Cadastrar pessoa</button>
		</div>

	</form>
@stop
