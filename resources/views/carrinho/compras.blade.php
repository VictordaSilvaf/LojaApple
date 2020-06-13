@extends('layout')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/compras.css') }}">
@endsection
@section('Conteudo')

    <div class="container conteudoCompras p-5">
        <h2 class="p-3">Minhas compras</h2>
        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">{{ Session::get('mensagem-sucesso') }}</div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">{{ Session::get('mensagem-falha') }}</div>
        @endif

        <div class="row col-12 mt-3" style="z-index: 0; position: relative;">
            <h3 class="col-12">Compras concluídas</h3>

            @forelse ($compras as $pedido)

                <div class="row col-12">
                    <h5 class="col-lg-6 col-sm-12 col-md-6"> Pedido: {{ $pedido->id }} </h5>
                    <h5 class="col-lg-6 col-sm-12 col-md-6"> Criado
                        em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                    <form method="POST" action="{{ route('carrinho.cancelar') }}" class="col-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                        <table class="table text-white">
                            <thead>
                            <tr>
                                <th colspan="2"></th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Desconto</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total_pedido = 0;
                                $pedido_produto = 0
                            @endphp
                            @foreach ($pedido->pedido_produtos_itens as $pedido_produto)

                                @php
                                    $total_produto = ($pedido_produto->produto->preco - $pedido_produto->desconto);
                                    $total_pedido += $total_produto
                                @endphp

                                <tr>
                                    <td class="">
                                        @if($pedido_produto->status == 'PA')
                                            <p class="center">
                                                <input type="checkbox" id="item-{{ $pedido_produto->id }}" name="id[]"
                                                       value="{{ $pedido_produto->id }}"/>
                                                <label for="item-{{ $pedido_produto->id }}">Selecionar</label>
                                            </p>
                                        @else
                                            <strong class="red-text">CANCELADO</strong>
                                        @endif
                                    </td>
                                    <td>
                                        <img width="100" height="100"
                                             src="{{ asset('storage/'.$pedido_produto->produto->src) }}">
                                    </td>
                                    <td>{{ $pedido_produto->produto->nome }}</td>
                                    <td>R$ {{ number_format($pedido_produto->produto->preco, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-outline-danger col-12 tooltipped"
                                            data-position="bottom" data-delay="50"
                                            data-tooltip="Cancelar itens selecionados">
                                        Cancelar
                                    </button>
                                </td>
                                <td colspan="3"></td>
                                <td><strong>Total do pedido</strong></td>
                                <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                    @empty
                        <h5 class="center">
                            @if ($cancelados->count() > 0)
                                Neste momento não há nenhuma compra valida.
                            @else
                                Você ainda não fez nenhuma compra.
                            @endif
                        </h5>
                </div>

            @endforelse

            <div class="row col-12 mt-5">
                <div class="divider"></div>
                <h3 class="col-12">Compras canceladas</h3>
                @forelse ($cancelados as $pedido)
                    <h5 class="col l2 s12 m2"> Pedido: {{ $pedido->id }} </h5>
                    <h5 class="col l5 s12 m5"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                    <h5 class="col l5 s12 m5"> Cancelado em: {{ $pedido->updated_at->format('d/m/Y H:i') }} </h5>
                    <table class="table text-white">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <th>Desconto</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_pedido = 0
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->produto->preco - $pedido_produto->desconto;
                                $total_pedido += $total_produto
                            @endphp
                            <tr>
                                <td>
                                    <img width="100" height="100"
                                         src="{{ asset('storage/'.$pedido_produto->produto->src) }}">
                                </td>
                                <td>{{ $pedido_produto->produto->nome }}</td>
                                <td>R$ {{ number_format($pedido_produto->produto->preco, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total do pedido</strong></td>
                            <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                        </tr>
                        </tfoot>
                    </table>
                @empty
                    <h5 class="center">Nenhuma compra ainda foi cancelada.</h5>
                @endforelse
            </div>
        </div>
    </div>

@endsection
