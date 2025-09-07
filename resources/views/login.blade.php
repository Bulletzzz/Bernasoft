<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
</head>
<body class="paginaAutenticacao">
    <div class="containerAutenticacao">
        <div class="cardAutenticacao">
            <div class="cabecalhoAutenticacao">
                <div class="logoAutenticacao">Bernasoft</div>
                <h1 class="tituloAutenticacao">Faça login</h1>
            </div>

            {{-- Mensagens de sucesso/erro --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <form id="formLogin" class="formularioAutenticacao" method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="grupoInput">
                    <label for="email" class="rotuloInput">E-mail</label>
                    <input type="email" name="email" id="email" class="campoInput" placeholder="seu@email.com" required>
                </div>
                
                <div class="grupoInput">
                    <label for="senha" class="rotuloInput">Senha</label>
                    <input type="password" name="senha" id="senha" class="campoInput" placeholder="Digite sua senha" required>
                </div>
                
                <button type="submit" class="botaoAutenticacao">Entrar</button>
                
                <p class="opcaoAlternativa">
                    Não tem uma conta? <a href="{{ route('usuarios.create') }}" class="linkAlternativo">Cadastre-se</a>
                </p>
            </form>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
