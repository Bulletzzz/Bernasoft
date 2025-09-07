<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquinas - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="paginaMaquinas">
<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo Bernasoft">
        <section class="cabeca"><h1>Máquinas</h1></section>
        <section class="aq">
            <button id="perfil" onclick="window.location.href='{{ route('perfil') }}'">
                <h1>Perfil</h1>
                <i class="fa-solid fa-user"></i>
            </button>
        </section>
    </header>

    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="{{ route('inicio') }}"><button><i class="fas fa-home"></i>Inicio</button></a></li>
                <li><a href="{{ route('modelos.index') }}"><button><i class="fas fa-gears"></i>Modelos</button></a></li>
                <li><a href="{{ route('maquinas.index') }}"><button id="botaosel"><i class="fas fa-shop"></i>Máquinas</button></a></li>
                <li><a href="{{ route('inventario.index') }}"><button><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
                <li><a href="{{ route('charts') }}"><button><i class="fas fa-chart-line"></i>Relatórios</button></a></li>
            </ul>
        </nav>
    </aside>

    <section class="conteudo">
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

        <div id="Titulo">
            <h1>Máquinas Instaladas</h1>
            <p>Gerencie suas máquinas instaladas</p>
        </div>

        <button id="novamaq" class="btnnovo">Cadastrar nova máquina</button>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Modelo</th>
                    <th>Data Instalação</th>
                    <th>Local</th>
                    <th>Aluguel</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($maquinas as $maquina)
                    <tr>
                        <td>{{ $maquina->nome }}</td>
                        <td>{{ $maquina->modelo->nome }}</td>
                        <td>{{ $maquina->data_instalacao }}</td>
                        <td>{{ $maquina->local }}</td>
                        <td>{{ $maquina->preco }}</td>
                        <td>
                            <a href="{{ route('maquinas.edit', $maquina->id) }}">Editar</a> |
                            <form action="{{ route('maquinas.destroy', $maquina->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
</main>

{{-- JS --}}
<script src="{{ asset('js/maquina.js') }}"></script>
</body>
</html>
