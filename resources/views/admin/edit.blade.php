@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="container" style="margin-top: 60px">
        <form method="post" action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data">
            @method('put')
            <div style="margin: 15px 10px 0px 10px">
                @csrf

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Nome: </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nome do produto"
                           aria-label="Recipient's username" aria-describedby="basic-addon2"
                           name="nome" id="nome" value="{{ $produto->nome }}" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Preço: </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Preço do produto"
                           aria-label="Recipient's username" aria-describedby="basic-addon2"
                           name="preco" id="preco" value="{{ $produto->preco }}" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">Descrição: </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Descrição do produto"
                           aria-label="Recipient's username" aria-describedby="basic-addon2"
                           name="descricao" id="descricao" value="{{ $produto->descricao }}" required>
                </div>
                <div class="input-group mb-3 form-group">
                    <div class="input-group-append">
                        <label for="exampleFormControlSelect1" class="input-group mb-3 input-group-text" id="basic-addon2">Categoria: </label>
                    </div>
                    <select class="form-control" id="exampleFormControlSelect1" aria-describedby="basic-addon2" name="categoria" id="categoria" required>
                        <option>Smartfone</option>
                        <option>AirPods</option>
                        <option>MacBook</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02"
                               name="src" value="{{ $produto->src }}">
                        <label class="custom-file-label"
                               for="inputGroupFile02">{{ $produto->src }}</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('produto.index') }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                </button>
                </a>
                <button type="submit" class="btn btn-primary">Salvar Produto</button>
            </div>
        </form>
    </div>
@endsection
