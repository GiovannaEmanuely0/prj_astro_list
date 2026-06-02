<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="{{url('css/adm.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <section class="viewPrincipal">
        <x-header/>
        <div class="secaoPrincipal">
            <x-menu/>
            <div class="divPrincipal">
                <div class="divNomeAdm">
                    <h1>Bem-vindo {{$adm->nome}}</h1>
                </div>
                <div class="divSecundaria">

                    <h1>Usuários</h1>

                    <div class="configAdm">
                        <div class="divIcone">
                            <span class="material-symbols-outlined">search</span>
                            <input type="text" name="" id="" class="inputAdm" placeholder="nome...">
                        </div>
                        <div>
                            <select name="" id="">
                                <option value="opcaoes">Filtro</option>
                                <option value="opcaoes">Excluídos</option>
                                <option value="opcaoes">Excluídos</option>
                                <option value="opcaoes">Excluídos</option>
                            </select>
                            <label for="">Filtro</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Selecionar todos</label>
                        </div>
                    </div>

                    <div class="divUsuario">
                        @foreach($usuario as $u)
                            <div class="usuario">
                                <div class="divIcone">
                                    <input type="checkbox" name="" id="">
                                    <p>{{$u->nome}}</p>
                                </div>
                                <p>{{$u->email}}</p>
                                <div class="divIcone">
                                    <!-- <span class="material-symbols-outlined edit">edit</span> -->
                                    <span class="material-symbols-outlined del">delete</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h1>Gráficos</h1>
                    <div class="divGrafico">
                        <div class="grafico">Aqui vão gráficos</div>
                        <div class="grafico"></div>
                        <div class="graficoEspecial"></div>
                    </div>
                    <h1>Dados dos usuários</h1>
                    <div class="divCards">
                        <div class="card alta"><p>Usuários</p><h1>1</h1></div>
                        <div class="card medio"><p>Tarefas</p><h1>1</h1></div>
                        <div class="card baixo"><p>Grupos</p><h1>1</h1></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
</html>