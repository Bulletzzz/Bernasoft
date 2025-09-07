<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
</head>
<body class="paginaAutenticacao">
    <div class="containerAutenticacao">
        <div class="cardAutenticacao">
            <div class="cabecalhoAutenticacao">
                <div class="logoAutenticacao">Bernasoft</div>
                <h1 class="tituloAutenticacao">Bem-vindo ao Bernasoft</h1>
            </div>

            <p class="opcaoAlternativa">
                Gerencie com eficiência seu negócio. Somos a solução de gerenciamento completa para suas máquinas de garra, projetada para maximizar sua lucratividade.
            </p>

            <div class="grupoInput">
                <a href="{{ route('login') }}">
                    <button class="botaoAutenticacao">Fazer login</button>
                </a>
            </div>

            <div class="grupoInput">
                <button class="botaoAutenticacao" id="consulta">Faça uma consulta já!</button>
            </div>

            {{-- Aqui você pode colocar imagens, banners ou conteúdo extra --}}
            <div class="grupoInput">
                <img src="{{ asset('assets/imagens/REc.png') }}" alt="Banner Bernasoft" style="width:100%;">
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
