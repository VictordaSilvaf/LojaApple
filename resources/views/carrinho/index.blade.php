@extends('layout')
@section('head')

@endsection
@section('Conteudo')

    <div class="container">

        <div class="row">
            <h3 class="text-white">Produtos no carrinho</h3>
            <hr/>
            @if (Session::has('mensagem-sucesso'))
                <div class="card-panel green">
                    <strong>{{ Session::get('mensagem-sucesso') }}</strong>
                </div>
            @endif
            @if (Session::has('mensagem-falha'))
                <div class="card-panel red">
                    <strong>{{ Session::get('mensagem-falha') }}</strong>
                </div>
            @endif
            @forelse ($pedidos as $pedido)
                <div class="col-12">
                    <h5 class="col-lg-6 col-md-12 col-sm-12 float-right"> Pedido: {{ $pedido->id }} </h5>
                    <h5 class="col-lg-6 col-md-12 col-sm-12 float-left"> Criado
                        em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                </div>
                <table class="table text-white rounded-lg text-center">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Qtd</th>
                        <th>Produto</th>
                        <th>Valor Unit.</th>
                        <th>Desconto(s)</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $pedido_produto = 0;
                        $total_pedido = 0;
                    @endphp
                    @foreach ($pedido->pedido_produtos as $pedido_produto)

                        <tr>
                            <td>
                                <img width="100" height="100"
                                     src="{{ asset('storage/'.$pedido_produto->produto->src) }}">
                            </td>
                            <td class="center-align">
                                <div class="center-align">
                                    {{--            Adicionar ou remover produto                --}}
                                    <a class="" href="#"
                                       onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                        <i class="material-icons small">remove_circle_outline</i>
                                    </a>
                                    <span class=""> {{ $pedido_produto->qtd }} </span>
                                    <a class="" href="#"
                                       onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                        <i class="material-icons small">add_circle_outline</i>
                                    </a>

                                </div>

                                <form action="{{ route('carrinho.remover', $pedido_produto->produto_id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Retirar produto</button>
                                </form>

                            </td>
                            <td> {{ $pedido_produto->produto->nome }} </td>
                            <td>R$ {{ number_format($pedido_produto->produto->preco, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
                            @php

                                $total_produto = ($pedido_produto->produto->preco - $pedido_produto->descontos) * $pedido_produto->qtd;
                                $total_pedido += $total_produto;
                            @endphp
                            <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{--            Total            --}}
                <div class="row col-12 mb-5">
                    <strong class="offset-8 col-2">Total do pedido: </strong>
                    <span class="col-2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
                </div>

                {{--            Cupom            --}}
                <div class="row col-lg-6 col-md-6 col-sm-12 justify-content-center">
                    <form method="POST" action="{{ route('carrinho.desconto') }}">
                        {{ csrf_field() }}

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" for="Cupom">Cupom de desconto:</span>
                            </div>
                            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                <input name="cupom" type="text" class="form-control" placeholder="Cupom" aria-label="Cupom" aria-describedby="basic-addon1">
                            <button class="btn-primary rounded-right">Validar</button>
                        </div>

                    </form>
                </div>


                <div class="row col-lg-6 col-md-6 col-sm-12">
                    <a class="col-lg-6 col-md-6 col-sm-6 " data-position="top" data-delay="50"
                       data-tooltip="Voltar a página inicial para continuar comprando?" href="{{ route('produtos') }}" style="text-decoration: none">
                        <button class="btn btn-secondary btn-sm btn-block">Continuar
                        comprando</button></a>
                    <form method="POST" action="{{ route('carrinho.concluir') }}" class="col-lg-6 col-md-6 col-sm-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" data-position="top" data-delay="50"
                                data-tooltip="Adquirir os produtos concluindo a compra?">
                            Concluir compra
                        </button>
                    </form>
                </div>
            @empty
                <h5>Não há nenhum pedido no carrinho</h5>
            @endforelse
        </div>
    </div>

    <form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id">
    </form>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>
    @endpush

@endsection
