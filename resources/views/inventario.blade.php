<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="paginaInventario">
<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo Bernasoft">
        <section class="cabeca"><h1>Inventário</h1></section>
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
                <li><a href="{{ route('maquinas.index') }}"><button><i class="fas fa-shop"></i>Máquinas</button></a></li>
                <li><a href="{{ route('inventario.index') }}"><button id="botaosel"><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
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
            <h1>Inventário</h1>
            <p>Gerencie os itens disponíveis no inventário</p>
        </div>

        <button id="novoitem" class="btnnovo">Adicionar Item</button>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itens as $item)
                    <tr>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->categoria }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>{{ $item->local }}</td>
                        <td>{{ $item->valor }}</td>
                        <td>
                            <a href="{{ route('inventario.edit', $item->id) }}">Editar</a> |
                            <form action="{{ route('inventario.destroy', $item->id) }}" method="POST" style="display:inline;">
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
<script src="{{ asset('js/inventario.js') }}"></script>
</body>
</html>
