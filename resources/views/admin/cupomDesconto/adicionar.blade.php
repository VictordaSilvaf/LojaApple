@extends('layouts.app')

@section('content')
	<div class="container mt-5">
		<div class="row">
			<h3>Adicionar cupom</h3>
			<form method="POST" action="{{ route('admin.cupons.salvar') }}">
				{{ csrf_field() }}
				@include('admin.cupomDesconto._form')

				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
		</div>
	</div>
@endsection
