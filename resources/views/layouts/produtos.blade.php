<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Apple Marketing</title>
    <link rel="shortcut icon" href="{{ asset('img/icons8-mac-os-24.png') }}">

    {{--CSS Animate ->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">

    @yield('Head')
</head>
<body>

<header class="banner text-white">
    <div class="container">
        <span style="font-size: 6em;">
            <a href="{{ route('index') }}">
            <i class="fab fa-apple size: 9x"></i>
            </a>
        </span>
    </div>
</header>

<nav class="navMenu text-white mt-3 mb-3">
    <ul class="nav justify-content-center">
        <li class="nav-item mr-3">
            <a class="nav-link text-white" href="{{ route('index') }}"><i class="fas fa-home mr-1"></i>Home</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link text-white" href="{{ route('produtos') }}"><i class="fas fa-store mr-1"></i>Produtos</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link text-white" href="{{ route('servicos') }}"><i class="fas fa-suitcase mr-1"></i>Serviços</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link text-white" href="{{ route('sobre') }}"><i class="fas fa-id-badge mr-1"></i>Sobre</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link text-white" href="{{ route('ajuda') }}"><i class="fas fa-hands-helping mr-1"></i>Ajuda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('adminLogin') }}"><i class="fas fa-user-alt mr-1"></i>Login</a>
        </li>
    </ul>

</nav>

<main>

    @yield('Conteudo')

</main>
<script src='{{ asset('js/wow.min.js') }}'></script>
<script src="{{ asset('js/index.js') }}"></script>
<script>
    new WOW().init();
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

