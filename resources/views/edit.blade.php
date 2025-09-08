<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/maquina.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
    
    </style>
</head>
<body>

<main class="container">
    <header>
        <img src="assets/imagens/logo.png" alt="">
        <section class="cabeca">
            <h1>Modelos</h1>
        </section>
        <section class="aq">
            <button id="perfil" onclick="window.location.href='perfil.html'">
                <h1>Perfil</h1>
                <i class="fa-solid fa-user"></i>
            </button>
        </section>
    </header>

            <div id="categoriasbox" class="boxsuspensa.ativo">
                <div class="novoprodbox2" >
                    <i class="fa-solid fa-xmark" id="fechar2"></i>

                        <div id="catbox1">
                            <div id="catboxtitulo" style="font-size: 30px; margin: 20px 0px">
                                    <h1 style="color: #191c3c; margin-bottom: 10px">Categorias</h1>
                                    <p style="color: rgb(102, 102, 102); font-size:20px">Gerencie suas categorias</p>
                            </div>

                            <div id="catbox2">
                            <div id="catboxtabela">
                                <h1 style="color: #191c3c; margin-bottom: 10px">Categorias existentes</h1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nome da categoria</th>
                                            <th>Editar nome</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabcategorias">
                                    </tbody>
                                </table>
                            </div>
                            <div class="barravertical" style="height: 80%; margin: 0px 20px;"></div>
                            <div id="catboxnovacat">
                                <div id="catboxtitulo">
                                    <h1 style="color: #191c3c; margin-bottom: 10px">Editar categoria</h1>
                                </div>
                                <form action="/maquinas/update/{{$categoria->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input value="{{$categoria->title}}" type="text" name="title" id="Nomecat" class="inputdados" style="width: 600px;" placeholder="Nome da categoria*">
                                    <input type="submit" class="salvar">
                                </form>
                                <p style="color: red;" id ="msgerro"></p>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
    </main>

</body>
</html>