<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Bernasoft</title>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
</head>
<body class="paginaAutenticacao">
    <div class="containerAutenticacao">
        <div class="cardAutenticacao">
            <div class="cabecalhoAutenticacao">
                <div class="logoAutenticacao">Bernasoft</div>
                <h1 class="tituloAutenticacao">Crie sua conta</h1>
            </div>

            {{-- Mensagens de sucesso/erro --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('cadastro.store') }}">
                @csrf
                <div class="grupoInput">
                    <label for="nome" class="rotuloInput">Nome completo</label>
                    <input type="text" name="nome" id="nome" class="campoInput" placeholder="Seu nome completo" required>
                </div>
                
                <div class="grupoInput">
                    <label for="emailCadastro" class="rotuloInput">E-mail</label>
                    <input type="email" name="email" id="emailCadastro" class="campoInput" placeholder="seu@email.com" required>
                </div>
                
                <div class="grupoInput">
                    <label for="senhaCadastro" class="rotuloInput">Senha</label>
                    <input type="password" name="senha" id="senhaCadastro" class="campoInput" placeholder="Mínimo 6 caracteres" required>
                </div>
                
                <div class="grupoInput">
                    <label for="cpf" class="rotuloInput">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="campoInput" placeholder="000.000.000-00" required>
                </div>
                
                <button type="submit" class="botaoAutenticacao">Cadastrar</button>
                
                <p class="opcaoAlternativa">
                    Já tem uma conta? <a href="{{ url('/login') }}" class="linkAlternativo">Faça login</a>
                </p>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
