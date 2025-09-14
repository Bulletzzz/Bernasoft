<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Bernasoft</title>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="">
        <section class="cabeca"><h1>Inicio</h1></section>
        <section class="aq">
            <a href="/perfil">
                <button id="perfil"><h1>Perfil</h1><i class="fa-solid fa-user"></i></button>
            </a>
        </section>
    </header>

    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="/inicio"><button id="botaosel"><i class="fas fa-home"></i>Inicio</button></a></li>
                <li><a href="/maquinas/gerenciar"><button><i class="fas fa-shop"></i>Maquinas</button></a></li>
                <li><a href="/inventario"><button><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
            </ul>
        </nav>
    </aside>

    <section class="conteudo">
        <div class="telaInicial">
            <h1 class="titulo-boas-vindas">Bem-vindo ao Bernasoft</h1>
            <div class="botoes-acoes">
                <a href="/maquinas/gerenciar" class="botao-acao">
                    <i class="fas fa-box"></i>
                    <h3>Gerenciar Maquinas</h3>
                </a>
                <a href="/perfil" class="botao-acao">
                    <i class="fas fa-user"></i>
                    <h3>Perfil</h3>
                </a>
                <a href="/inventario" class="botao-acao">
                    <i class="fas fa-boxes-stacked"></i>
                    <h3>Inventário</h3>
                </a>
            </div>
        </div>
    </section>
</main>
</body>
</html>
