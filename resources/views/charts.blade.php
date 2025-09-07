<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Bernasoft</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="paginaCharts">
<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="Logo Bernasoft">
        <section class="cabeca"><h1>Relatórios</h1></section>
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
                <li><a href="{{ route('inventario.index') }}"><button><i class="fas fa-boxes-stacked"></i>Inventário</button></a></li>
                <li><a href="{{ route('charts') }}"><button id="botaosel"><i class="fas fa-chart-line"></i>Relatórios</button></a></li>
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
            <h1>Relatórios</h1>
            <p>Visualize os dados do sistema</p>
        </div>

        <canvas id="graficoModelos" width="400" height="200"></canvas>
        <canvas id="graficoMaquinas" width="400" height="200"></canvas>

    </section>
</main>

{{-- JS --}}
<script src="{{ asset('js/charts.js') }}"></script>
<script>
    const ctxModelos = document.getElementById('graficoModelos').getContext('2d');
    const graficoModelos = new Chart(ctxModelos, {
        type: 'bar',
        data: {
            labels: {!! json_encode($modelosNomes) !!},
            datasets: [{
                label: 'Quantidade por modelo',
                data: {!! json_encode($modelosQuantidades) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: { responsive: true }
    });

    const ctxMaquinas = document.getElementById('graficoMaquinas').getContext('2d');
    const graficoMaquinas = new Chart(ctxMaquinas, {
        type: 'line',
        data: {
            labels: {!! json_encode($maquinasDatas) !!},
            datasets: [{
                label: 'Máquinas instaladas ao longo do tempo',
                data: {!! json_encode($maquinasQuantidades) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                fill: false,
                tension: 0.1
            }]
        },
        options: { responsive: true }
    });
</script>
</body>
</html>
