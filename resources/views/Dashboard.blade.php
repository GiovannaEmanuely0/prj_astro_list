<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
    
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <section class="viewPrincipal">
        <x-menu/>
        <div class="dashboard">
            <div class="dashboard_inicial">
                <div><h1>Olá, Explorador <i data-lucide="rocket"></i> </h1><p>Crie e execute aqui suas tarefas</p></div>
                <div>
                    <input type="text" name="" id="" placeholder="Buscar Tarefa...">
                    <button type="button">
                        <i data-lucide="bell"></i> 
                    </button>
                    <button type="button">+ Nova Tarefa</button>
                </div>
            </div>
            <div class="dashboard_secaotarefas">
                <h1>hoje - </h1>
                <div>
                    <ul>
                        <li><div><input type="radio" name="" id=""><i data-lucide="orbit"></i> <h2>tarefa</h2></div><div>
                            <h3>categoria</h3><p>data</p><i data-lucide="ellipsis-vertical"></i>
                        </div></li>
                    </ul>
                </div>
            </div>
            <div class="dashboard_final">
                    <img src="{{asset('img/logoAstrolist/saturn.png')}}" alt="" class="saturn">
                    <div><h1>título</h1><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nostrum nesciunt animi enim dignissimos debitis ea.</p></div>
            </div>
        </div>
    </section>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
