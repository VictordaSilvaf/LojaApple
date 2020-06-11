@extends('layouts.app')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('content')
    @auth
        <div class="row">
            <div class="col-1" style="display: table; position: relative; height: 100vh; z-index: 1">
                <ul class="list-group" style=" position: fixed; top: 45%; display: table-cell; vertical-align: middle;">
                    <a href="{{ route('produto.index') }}">
                        <li class="list-group-item">Produtos</li>
                    </a>
                    <a href="#">
                        <li class="list-group-item">Pedidos</li>
                    </a>
                    <a href="/home/cupons">
                        <li class="list-group-item">Cupons</li>
                    </a>
                </ul>
            </div>
            <div class="col-10" style="margin-top: 60px; z-index: 0">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <span><h3 class="d-inline-flex">Dashboard</h3></span>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#adicionarModal" style="float: right">Adicionar
                                </button>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(!empty($mensagem))
                                <div class="alert alert-success">
                                    {{ $mensagem }}
                                </div>
                            @endif

                            <div class="container">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                {{-- content --}}
                                <div class="tabela">
                                    {{-- Percorrer a tabela produtos--}}
                                    <hr>
                                    @foreach($produtos as $produto)
                                        <div class="produtos row"
                                             style="height: auto; cursor:pointer; border-radius: 4px;"
                                             name="{{ $produto->id }}">
                                            <div class="imagems col-2 float-left" style="height: 100%">
                                                <img src="{{ asset('storage/'.$produto->src) }}" class=""
                                                     style="height: auto; width: 100%; max-height: 100%">
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-8" style="padding: 0">
                                                <div class="infos col-12 row" style="padding: 0">
                                                    <div class="nome col text-dark font-weight-bold">
                                                        <h5>{{ $produto->nome }}</h5></div>
                                                    <div class="preco col text-success text-right"><h5>
                                                            R$ {{ number_format($produto->preco, 2, ',', '.') }}</h5>
                                                    </div>
                                                </div>
                                                <div class="descricoes col-12 text-secondary font-italic text-justify"
                                                     style="margin-top: 30px">
                                                    <h6 class="mr-4">{{ $produto->descricao }}</h6>
                                                </div>
                                            </div>
                                            <div class="btns col-lg-1 col-md-2 col-sm-2 float-right"
                                                 style="height: 100%;">
                                                <a href="{{ route('produto.edit', $produto->id) }}">
                                                    <button type="button" class="btn btn-primary">
                                                        <span class="material-icons align-middle">edit</span>
                                                    </button>
                                                </a>
                                                <form action="{{ route('produto.destroy', $produto->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                            style="margin-top: 2.5px">
                                                        <span class="material-icons align-middle">close</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <!-- Modal Cadastrar-->
                        <div class="modal fade" id="adicionarModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Produto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="/home" enctype="multipart/form-data">
                                        <div style="margin: 15px 10px 0px 10px">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Nome: </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nome do produto"
                                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                                       name="nome" id="nome" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Preço: </span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Preço do produto"
                                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                                       name="preco" id="preco" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Descrição: </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                       placeholder="Descrição do produto"
                                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                                       name="descricao" id="descricao" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">Categoria: </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                       placeholder="Categoria do produto"
                                                       aria-label="Recipient's username" aria-describedby="basic-addon2"
                                                       name="categoria" id="categoria" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile02"
                                                           name="src" value="null" required>
                                                    <label class="custom-file-label"
                                                           for="inputGroupFile02">Imagem do produto</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Salvar Produto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
