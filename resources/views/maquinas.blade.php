<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/maquina.js') }}" defer></script>
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
            <h1>Maquinas</h1>
        </section>
        <section class="aq">
            <button id="perfil" onclick="window.location.href='/perfil'">
                <h1>Perfil</h1>
                <i class="fa-solid fa-user"></i>
            </button>
        </section>
    </header>

        <div id="infobox">
            <p>Crie e gerencie seus modelos e categorias. Clique em adicionar categoria para criar e editar. É possível acessar o menu de cadastro no botão "Cadastrar máquinas". Na lista de máquinas criadas é possível editar individualmente clicando nos três pontinhos na lateral.</p>
        </div>

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

            <!--Aqui é o menu de criacao de produto novo-->
            <div id="backgroundbox" class="boxsuspensa">
            <div class="novoprodbox">
                <i class="fa-solid fa-xmark" id="fechar"></i>
                <div class="entupldimg">
                    <div id="moldura">
                        <img id="preview" src="" alt="" style="display: none;"/>
                    </div>
                    <label for="imageInput" id="imglabel">ESCOLHER IMAGEM</label>
                    <input type="file" id="imageInput" accept="image/*" style="display: none;"/> 
                </div>
                <div class="barravertical"></div>
                <div class="resto">
                    <div id="catboxtitulo" style="font-size: 20px; margin: 20px 0px">
                                    <h1 style="color: #191c3c; margin-bottom: 10px">Modelos de maquinas</h1>
                                    <p style="color: rgb(102, 102, 102); font-size:15px" id="msgmodelo">Crie modelo novo</p>
                            </div>
                    <input type="text" name="" id="nome" placeholder="Nome*" class="inputdados">
                    <div class="mensagem-erro"></div>
                    <br>
                    <input type="text" name="" id="modelo" placeholder="Modelo*" class="inputdados">
                    <div class="mensagem-erro"></div>
                    <br>
                    <input type="text" name="" id="fabricante" placeholder="Fabricante*" class="inputdados">
                    <div class="mensagem-erro"></div>
                    <br>
                    <input type="text" name="" id="preco" class="inputdados" placeholder="Valor custo*">
                    <div class="mensagem-erro"></div>
                    <br>
                    <input type="text" name="" id="descricao" placeholder="Descrição" class="inputdados">
                    <div class="mensagem-erro"></div>
                    <br>
                    <select name="categoria" id="categoria" class="inputdados">
                        <option value="" disabled selected>Selecione uma categoria*</option>
                    </select>
                    <div class="mensagem-erro"></div>
                    <button id="statusbtn" class="statusativo" style="margin-top: 20px;">Ativo</button>
                    <div id="catboxbtn">
                    <button id="enviar" class="salvar" style="margin-top: 20px;">Salvar</button>
                    <button id="excluir" style="margin-top: 20px;">Excluir</button>
                    </div>
                </div>
            </div>
            </div>

            <!--Area de gerenciamento de categorias-->
            <div id="categoriasbox" class="boxsuspensa">
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
                                            <th>Status</th>
                                            <th>Editar nome</th>
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabcategorias">
                                        @foreach($categorias as $categoria)
                                            <tr>
                                                <td>{{$categoria->formatted_name}}</td>
                                                <td>
                                                    <span class="status @if(!$categoria->status) inativo @endif">
                                                        {{$categoria->dynamic_status}}
                                                    </span>
                                                </td>

                                                <td>
                                                    <a href="{{ url('/maquinas/edit/' . $categoria->id . '?view_mode=' . $current_view) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                <form action="/maquinas/{{$categoria->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border:none; background:none; cursor:pointer; color: #000; font-size: 20px;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="barravertical" style="height: 80%; margin: 0px 20px;"></div>
                            <div id="catboxnovacat">
                                <div id="catboxtitulo">
                                    <h1 style="color: #191c3c; margin-bottom: 10px">Criar nova categoria</h1>
                                </div>
                                <form action="/maquinas" method="POST">
                                    @csrf
                                    <input type="text" name="title" id="Nomecat" class="inputdados" style="width: 600px;" placeholder="Nome da categoria*">
                                    <input type="submit" class="salvar">
                                </form>
                                <p style="color: red;" id ="msgerro"></p>
                            </div>
                            </div>
                        </div>
                </div>
            </div>

            <div id="conteudo2">

            



                <!--Parte superior com info sobre maquinas-->
                <div id="Titulo" style="color: #191c3c; margin: 20px 0px">
                    <h1>Modelos</h1>
                    <p style="color: rgb(102, 102, 102); font-size:14px">Gerencie seus modelos</p>
                </div>

                <div id="infomaq">
                    <div id="info1">
                        <h3>Modelos cadastrados</h3>
                        <h1 id="numerodemaquinas" style="color:royalblue;"></h1>
                    </div>
                    <div id="info2">
                    </div>
                </div>

                <hr class="divisoria"> <!--Divisoria entre uma area e outra-->

                <!--Parte para cadastro de novas maquinas-->
                <div id="areacad">
                    <div id="areacadinfo">
                        <h1 style="color: #191c3c;">Gerenciar modelos</h1>
                        <p style="color: rgb(102, 102, 102); font-size:14px">Cadastre novos modelos</p>
                    </div>
                    <div id="areacadbtn">
                        <button id="categoriasbtn" class="btnnovo"><i class="fa-solid fa-xmark" style="rotate: 45deg; margin-right:5px;z-index: -1;"></i>Admnistrar categorias</button>
                        <button id="novoprod" class="btnnovo"><i class="fa-solid fa-xmark" style="rotate: 45deg; margin-right:5px;z-index: -1;"></i>Cadastrar modelo</button>
                        @if($current_view == 'admin')
                            <a href="{{ route('maquinas.index', ['view_mode' => 'default']) }}" class="btnnovo" style="background-color: #f39c12; text-align: center;">
                                <i class="fas fa-user"></i> Ver como Usuário
                            </a>
                        @else
                            <a href="{{ route('maquinas.index', ['view_mode' => 'admin']) }}" class="btnnovo" style="background-color: #e74c3c; text-align: center;">
                                <i class="fas fa-user-shield"></i> Ver como Admin
                            </a>
                        @endif
                        <a href="{{ route('reports.categories.download', 'html') }}" class="btnnovo" style="background-color: #f50000ff; text-align: center;">
                                <i class="fas fa-paper"></i> Relatorio Categorias
                            </a>
                    </div>
                </div>

                <hr class="divisoria"> <!--Divisoria entre uma area e outra-->

                <!--Area para produtos cadastrados-->
                <div id="maqscads">
                    <div id="maqscadsinfo">
                        <h3 style="color: rgb(102, 102, 102); font-size:20px; font-weight: normal;">Maquinas cadastradas</h3>
                    </div>
                    <div id="entidades3">

<table>
    <thead>
      <tr>
        <th>Maquina</th>
        <th>Modelo</th>
        <th>Fabricante</th>
        <th>Categoria</th>
        <th>Custo</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="entidades">
        @foreach($maquinas as $maquina)
            <tr>
                    <td><img src="${produtos[qntprods-1].img}" alt="">{{$maquina->title}}</td>
                                <td class="categoria">{{$maquina->model}}</td>
                                <td>{{$maquina->fab}}</td>
                                <td>{{$maquina->category}}</td>
                                <td>{{$maquina->cost}}</td>
                                <td><span class="status @if($maquina->status == 0) inativo @endif">{{$maquina->dynamic_status}}</span></td> 
                                <td class="tresponto">⋮</td>
                    </tr>
                @endforeach
    </tbody>

</table>
                        
                    </div>
                </div>

            </div>
        </section>

    </main>

    <div class="font-buttons">
        <button id="increase-font">A+</button>
        <button id="decrease-font">A-</button>
        </div>
    
        <script>
          let currentFontSize = parseFloat(getComputedStyle(document.body).fontSize) || 16;
          const minFontSize = 13;
          const maxFontSize = 26;
        
          document.getElementById('increase-font').addEventListener('click', () => {
            if (currentFontSize < maxFontSize) {
              currentFontSize += 2;
              if (currentFontSize > maxFontSize) currentFontSize = maxFontSize;
              document.body.style.fontSize = currentFontSize + 'px';
            }
          });
      
          document.getElementById('decrease-font').addEventListener('click', () => {
            if (currentFontSize > minFontSize) {
              currentFontSize -= 2;
              if (currentFontSize < minFontSize) currentFontSize = minFontSize;
              document.body.style.fontSize = currentFontSize + 'px';
            }
          });
        </script>

</body>
</html>
