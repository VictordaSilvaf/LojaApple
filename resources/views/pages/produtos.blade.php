@extends('layouts.produtos')
@section('Head')
    <meta name="description" content="Blueprint: A responsive product grid layout with touch-friendly Flickity galleries and Isotope-powered filter functionality." />
    <meta name="keywords" content="blueprint, template, layout, grid, responsive, products, store, filter, isotope, flickity" />
    <meta name="author" content="Codrops" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Pixel Fabric clothes icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('font/fontsProdutos/pixelfabric-clothes/style.css') }}" />
    <!-- General demo styles & header -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssProdutos/demo.css') }}" />
    <!-- Flickity gallery styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssProdutos/flickity.css') }}" />
    <!-- Component styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssProdutos/component.css') }}" />
    <script src="{{ asset('js/jsProdutos/modernizr.custom.js') }}"></script>

@endsection
@section('Conteudo')

    <!-- Bottom bar with filter and cart info -->
    <div class="view">
        <div class="bar wow animate__animated animate__fadeInUp" data-wow-delay="0.s">
            <div class="filter">
                <span class="filter__label">Filter: </span>
                <button class="action filter__item filter__item--selected" data-filter="*">All</button>
                <button class="action filter__item" data-filter=".Smartfones"><span class="action__text">Smartfones</span></button>
                <button class="action filter__item" data-filter=".AirPods"><span class="action__text">AirPods</span></button>
                <button class="action filter__item" data-filter=".MacBook"><span class="action__text">MacBook</span></button>

            </div>
            <form action="{{ route('carrinho.index') }}" method="get">
                {{ csrf_field() }}
                <button class="cart" type="submit">
                    <i class="cart__icon fa fa-shopping-cart"></i>
                    <span class="text-hidden">Shopping cart</span>
                    <a class="cart__count material-icons">
                        >
                    </a>
                </button>
            </form>
        </div>

        <!-- Grid -->
        <section class="grid grid--loading">
            <!-- Loader -->
            <img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
            <!-- Grid sizer for a fluid Isotope (Masonry) layout -->
            <div class="grid__sizer"></div>

            @foreach($produtos as $produto)
                <div id="{{ $produto->id }}" class="grid__item {{ $produto->categoria }}">
                    <div class="slider">
                        {{--slider dos produtos--}}
                        <div class="slider__item"><img class="imagemProduto" src="{{ asset('storage/'.$produto->src) }}" alt="Dummy" /></div>
                        <div class="slider__item"><img src="{{ asset('img/Iphone8/normal/apple-iphone-8-red.png') }}" alt="Dummy" /></div>
                        <div class="slider__item"><img src="{{ asset('img/Iphone8/normal/iphone8-silver-select-2018_1400x.png') }}" alt="Dummy" /></div>
                    </div>
                    <div class="meta">
                        <h3 class="meta__title">{{ $produto->nome }}</h3>
                        <span class="meta__brand">{{ $produto->descricao }}</span>
                        <span class="meta__price">R${{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </div>
                    <form method="POST" action="{{ route('carrinho.adicionar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <button type="submit" id="{{ $produto->id }}" class="action action--button action--buy btn-carrinho"><i class="fa fa-shopping-cart"></i><span class="text-hidden">Add to cart</span></button>
                    </form>
                </div>
            @endforeach

        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jsProdutos/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jsProdutos/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jsProdutos/main.js') }}"></script>
    <script src="{{ asset('js/jsProdutos/carrinho.js') }}"></script>
@endsection
