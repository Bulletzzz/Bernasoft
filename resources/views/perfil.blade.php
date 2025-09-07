<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="paginaPerfil">
    <main class="container">
        <header>
            <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo Bernasoft">
            <section class="cabeca"><h1>Perfil</h1></section>
        </header>

        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('inicio') }}"><button><i class="fas fa-home"></i>Inicio</button></a></li>
                    <li><a href="{{ route('modelos.index') }}"><button><i class="fas fa-gears"></i>Modelos</button></a></li>
                    <li><a href="{{ route('maquinas.index') }}"><button><i class="fas fa-shop"></i>Máquinas</button></a></li>
                    <li><a href="{{ route('inventario.index') }}"><button><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
                    <li><a href="{{ route('charts') }}"><button><i class="fas fa-chart-line"></i>Relatórios</button></a></li>
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

                <form id="form-perfil" method="POST" action="{{ route('perfil.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="campo-formulario">
                        <label for="nome-perfil">Nome:</label>
                        <input type="text" name="nome" id="nome-perfil" value="{{ old('nome', $user->nome) }}" required>
                    </div>

                    <div class="campo-formulario">
                        <label for="cpf-perfil">CPF:</label>
                        <input type="text" name="cpf" id="cpf-perfil" value="{{ old('cpf', $user->cpf) }}" required>
                    </div>

                    <div class="campo-formulario">
                        <label for="email-perfil">E-mail:</label>
                        <input type="email" name="email" id="email-perfil" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="botoes-acao">
                        <button type="submit" class="botao-salvar"><i class="fas fa-save"></i> Salvar alterações</button>
                        <a href="{{ route('logout') }}" class="botao-sair"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    {{-- JS --}}
    <script src="{{ asset('js/perfil.js') }}"></script>
</body>
</html>
