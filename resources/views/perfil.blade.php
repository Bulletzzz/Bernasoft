<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Bernasoft</title>
</head>
<body>

<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="">
        <section class="cabeca"><h1>Perfil</h1></section>
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
        <div class="perfil-container">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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

            <div class="foto-perfil-container">
                <img id="foto-perfil" src="{{ asset('assets/imagens/fotoperfilpadrao.jpg') }}" alt="Foto do perfil">
                <div class="upload-foto">
                    <input type="file" id="input-foto" accept="image/*" style="display: none;">
                    <button id="botao-foto" class="botao-editar"><i class="fas fa-camera"></i> Alterar foto</button>
                </div>
            </div>

            <form id="form-perfil" class="form-perfil" method="POST" action="{{ route('perfil.update') }}">
                @csrf
                @method('PUT')
                <div class="campo-formulario">
                    <label for="nome-perfil">Nome:</label>
                    <input type="text" id="nome-perfil" name="nome" value="{{ old('nome', $user->nome) }}" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="cpf-perfil">CPF:</label>
                    <input type="text" id="cpf-perfil" name="cpf" value="{{ old('cpf', $user->cpf) }}" required>
                </div>
                
                <div class="campo-formulario">
                    <label for="email-perfil">E-mail:</label>
                    <input type="email" id="email-perfil" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                
                <div class="botoes-acao">
                    <button type="submit" class="botao-salvar"><i class="fas fa-save"></i> Salvar alterações</button>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="botao-sair"><i class="fas fa-sign-out-alt"></i> Sair</button>
                    </form>
                </div>
            </form>
        </div>

        <div id="mensagem-perfil" class="mensagem-perfil"></div>
    </section>

</main>

<script src="{{ asset('js/perfil.js') }}" defer></script>

</body>
</html>
