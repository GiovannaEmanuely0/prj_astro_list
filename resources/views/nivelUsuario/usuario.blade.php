<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="{{url('css/usuario.css')}}">
    
    <script src="https://unpkg.com/lucide@latest"></script></head>
<body>
    <section class="viewPrincipal">
        <x-menu/>
        <div class="dashboard_usuario">
            <div class="dashboard_perfil">
                <div class="meu_perfil_dashboard">
                    <div class="meu_perfil_1">
                        <i data-lucide="circle-user-round"></i>
                        <div>
                            <h1>Meu Perfil</h1>
                            <p>Gerencie aqui seus dados</p>
                        </div>
                    </div>
                    <div class="meu_perfil_2">
                        <button type="button" class="botao">✒️Editar Perfil</button>
                        <button type="button" class="botao1">
                            <i data-lucide="settings"></i> 
                        </button>
                    </div>
                </div>
                <div class="perfil_dashboard">
                    <div class="perfil_1">
                        <div class="div_perfil">
                            <!-- lembrar de colocar a rota da imagem no form -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label class="upload-box">
                                    <input type="file" name="foto" id="foto" hidden>
                                    
                                    <div class="upload-content">
                                        <span>Selecionar imagem</span>
                                    </div>
                                </label>

                                <button type="submit">Enviar</button>
                            </form>
                            <div class="text_perfil">
                                <h1>{{$usuario->nome}}</h1>
                                <h2>{{$usuario->email}}</h2>
                                <h2>descricao</h2>
                            </div>
                        </div>
                        <div class="div_perfil2">
                            <div>
                                <icon>oi</icon>
                                <div>
                                    <h1>4569</h1>
                                    <p>xp?</p>
                                </div>
                            </div>
                            <div>
                                <icon>oi</icon>
                                <div>
                                    <h1>4569</h1>
                                    <p>xp?</p>
                                </div>
                            </div>
                            <div>
                                <icon>oi</icon>
                                <div>
                                    <h1>4569</h1>
                                    <p>xp?</p>
                                </div>
                            </div>
                            <div>
                                <icon>oi</icon>
                                <div>
                                    <h1>4569</h1>
                                    <p>xp?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="perfil_2">
                        <div>
                            <h1>próximo nível</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_atividades">
                <div class="menu_dashboard">
                    <div  class="ativo">
                        <i data-lucide="user"></i>
                        <h1>Visão Geral</h1>
                    </div>
                    <div>
                        <i data-lucide="chart-column-big"></i>
                        <h1>Estatísticas</h1>
                    </div>
                    <div>
                        <i data-lucide="settings"></i>
                        <h1>Visão Geral</h1>
                    </div>
                </div>
                <div class="ativid_dashboard">
                    <div class="ativ_first">
                        <h1>Atividades recentes</h1>
                        <div class="ativ_colunm">
                            <div>
                                <i data-lucide="chart-column-big"></i>
                                <h2>Concluiu a tarefa</h2>
                                <p>data</p>
                            </div>
                            <div>
                                <i data-lucide="chart-column-big"></i>
                                <h2>Concluiu a tarefa</h2>
                                <p>data</p>
                            </div>
                            <div>
                                <i data-lucide="chart-column-big"></i>
                                <h2>Concluiu a tarefa</h2>
                                <p>data</p>
                            </div>
                            <div>
                                <i data-lucide="chart-column-big"></i>
                                <h2>Concluiu a tarefa</h2>
                                <p>data</p>
                            </div>
                        </div>
                    </div>
                    <div class="ativ_first">
                        <h1>conquistas</h1>
                        <div class="ativ_row">
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            <div>
                                <i data-lucide="snowflake"></i>
                                <h2>Concluiu 10 tarefas</h2>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_footer">
                <div>
                    <i data-lucide="calendar-days"></i>
                    <div>
                        <h2>Membro desde</h2>
                        <p>data</p>
                    </div>
                </div>
                <div>
                    <i data-lucide="clock-4"></i>
                    <div>
                        <h2>Fuso Horário</h2>
                        <p>data</p>
                    </div>
                </div>
                <div>
                    <i data-lucide="globe"></i>
                    <div>
                        <h2>Idioma</h2>
                        <p>data</p>
                    </div>
                </div>
                
            </div>
        </div>        
    </section>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
