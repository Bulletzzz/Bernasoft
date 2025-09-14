<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário - Bernasoft</title>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="paginaInventario">

<main class="container">

    {{-- Cabeçalho --}}
    <header>
        <section class="cabeca"><h1>Inventário</h1></section>
        <section class="aq">
            <a href="/perfil">
                <button id="perfil"><h1>Perfil</h1><i class="fa-solid fa-user"></i></button>
            </a>
        </section>
    </header>

    {{-- Infobox --}}
    <div id="infobox" style="left: 775px;">
        <p>Faça o registro de inventário utilizando as informações de cadastro de máquina. É possível visualizar gráficos de inventários no menu de relatórios.</p>
    </div>

    {{-- Sidebar --}}
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="/inicio"><button><i class="fas fa-home"></i>Inicio</button></a></li>
                <li><a href="/maquinas/gerenciar"><button><i class="fas fa-shop"></i>Máquinas</button></a></li>
                <li><a href="/inventario"><button id="botaosel"><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
            </ul>
        </nav>
    </aside>

    {{-- Conteúdo --}}
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

        <div id="conteudo2">
            <div id="Titulo" style="color: #191c3c; margin: 20px 0px">
                <h1>Inventário</h1>
                <p style="color: rgb(102, 102, 102); font-size:14px">Registre um inventário</p>
            </div>
            <hr class="divisoria">

            {{-- Formulário de inventário --}}
            <div id="invbox1">
                <form action="{{ route('inventario.store') }}" method="POST">
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Máquina</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="date" name="data_inv" class="inputdados" required></td>
                                <td>
                                    <select name="id_modelo" class="inputdados" required>
                                        <option value="" disabled selected>Selecione uma máquina*</option>
                                        @foreach($maquinas as $maquina)
                                            <option value="{{ $maquina->id }}">{{ $maquina->nome }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="quantidade" class="inputdados" min="1" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="salvar" style="margin-top: 20px;">Enviar inventário</button>
                </form>
            </div>

            {{-- Tabela de inventários existentes --}}
            <div id="invbox2" style="margin-top: 40px;">
                <h3>Inventários cadastrados</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Máquina</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($itens as $item)
                        <tr>
                            <td>{{ $item->data_inv }}</td>
                            <td>{{ $item->modelo->nome ?? 'Sem modelo' }}</td>
                            <td>{{ $item->quantidade }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</main>



</body>
</html>
