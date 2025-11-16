<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
</head>
<body>

<main class="container">
    <header>
        <img src="{{ asset('assets/imagens/logo.png') }}" alt="">
        <section class="cabeca">
            <h1>Editar Categoria</h1>
        </section>
        <section class="aq">
            <button id="perfil" onclick="window.location.href='/perfil'">
                <h1>Perfil</h1>
                <i class="fa-solid fa-user"></i>
            </button>
        </section>
    </header>

    <div id="categoriasbox" style="visibility: visible; opacity: 1; position: relative; width: 100%; height: auto; background: none; display: flex; justify-content: center; padding-top: 100px;">
        <div class="novoprodbox2" style="position: relative; width: 80%; height: auto; padding: 20px;">

            <a href="{{ route('maquinas.index', ['view_mode' => $current_view]) }}" style="position: absolute; right: 30px; top: 30px; font-size: 40px; cursor: pointer; color: black; text-decoration: none;">
                <i class="fa-solid fa-xmark"></i>
            </a>

            <div id="catbox1" style="width: 100%;">
                <div id="catboxtitulo" style="font-size: 30px; margin: 20px 0px">
                    <h1 style="color: #191c3c; margin-bottom: 10px">Editar Categoria</h1>
                    <p style="color: rgb(102, 102, 102); font-size:20px">Modifique os dados da categoria</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                        <ul>
                            @foreach($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div id="catboxnovacat">
                    <form action="/maquinas/update/{{$categoria->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="view_mode" value="{{ $current_view }}">

                        <input type="hidden" name="id" value="{{ $categoria->id }}">

                        <div style="margin-bottom: 15px;">
                            <label for="Nomecat" style="display: block; margin-bottom: 5px; font-weight: bold;">Título</label>
                            <input value="{{$categoria->title}}" type="text" name="title" id="Nomecat" class="inputdados" style="width: 100%;" placeholder="Nome da categoria*" required>
                        </div>

                        <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="status" id="status" value="1" 
                                @if($categoria->status) checked @endif
                                style="width: 20px; height: 20px;">
                            <label for="status" style="font-size: 18px;">Status (Ativa)</label>
                        </div>

                        <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="visivel" id="visivel" value="1"
                                @if($categoria->visivel) checked @endif

                                @if($current_view !== 'admin' && !$categoria->visivel)
                                    disabled
                                @endif

                                style="width: 20px; height: 20px;">
                            <label for="visivel" style="font-size: 18px;">Visível (Público)</label>

                            @if($current_view !== 'admin')
                                <small style="color: #6c757d;">(Apenas Admins podem ocultar categorias)</small>
                            @endif
                        </div>

                        <input type="submit" class="salvar" value="Salvar Alterações">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>