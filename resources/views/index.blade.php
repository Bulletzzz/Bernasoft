<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="paginaModelos">
<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo Bernasoft">
        <section class="cabeca"><h1>Modelos</h1></section>
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
                <li><a href="{{ route('modelos.index') }}"><button id="botaosel"><i class="fas fa-gears"></i>Modelos</button></a></li>
                <li><a href="{{ route('maquinas.index') }}"><button><i class="fas fa-shop"></i>Máquinas</button></a></li>
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
            <h1>Modelos</h1>
            <p>Gerencie seus modelos de máquinas</p>
        </div>

        <button id="novoprod" class="btnnovo">Cadastrar modelo</button>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Categoria</th>
                    <th>Custo</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->nome }}</td>
                        <td>{{ $modelo->modelo }}</td>
                        <td>{{ $modelo->fabricante }}</td>
                        <td>{{ $modelo->categoria }}</td>
                        <td>{{ $modelo->preco }}</td>
                        <td>{{ $modelo->status }}</td>
                        <td>
                            <a href="{{ route('modelos.edit', $modelo->id) }}">Editar</a> |
                            <form action="{{ route('modelos.destroy', $modelo->id) }}" method="POST" style="display:inline;">
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
<script src="{{ asset('js/codigo.js') }}"></script>
</body>
</html>
