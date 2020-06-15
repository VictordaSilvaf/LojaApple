@extends('layouts.app')
@section('content')
	<div class="container _form" style="margin-top: 15vh">
		<div class="row">
			<h3>Editar cupom "{{ $registro->nome }}"</h3>
			<form method="POST" action="{{ route('admin.cupons.atualizar', $registro->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('admin.cupomDesconto._form')

				<button type="submit" class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection
