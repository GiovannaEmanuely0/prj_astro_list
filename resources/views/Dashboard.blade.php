<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <section class="viewPrincipal">
        <x-menu/>
        <div class="dashboard">

            <div class="dashboard_inicial">
                <div>
                    <h1>Olá, {{ Auth::user()->nome }} <i data-lucide="rocket"></i></h1>
                    <p>Crie e execute aqui suas tarefas</p>
                    <h1>Hoje - {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h1>
                </div>
                <div>
                    <button type="button">
                        <i data-lucide="bell"></i>
                    </button>
                    <button type="button" onclick="document.getElementById('formNovaTarefa').classList.toggle('hidden')">
                        + Nova Tarefa
                    </button>
                </div>
            </div>

            <div class="dashboard_secaotarefas">

                <form action="{{ route('tarefas.index') }}" method="GET" class="filtro_tarefas">
                    <input
                        type="text"
                        name="busca"
                        id="busca"
                        placeholder="Buscar Tarefa..."
                        value="{{ request('busca') }}"
                    >

                    <div>
                        <input
                            type="date"
                            name="dataInicioFiltro"
                            id="dataInicioFiltro"
                            value="{{ request('dataInicioFiltro') }}"
                        >
                        <input
                            type="date"
                            name="dataFimFiltro"
                            id="dataFimFiltro"
                            value="{{ request('dataFimFiltro') }}"
                        >
                    </div>

                    <select name="categoria" id="categoriaFiltro">
                        <option value="">Todas as categorias</option>
                        @foreach($categoriasDisponiveis ?? [] as $cat)
                            <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>

                    <select name="status" id="statusFiltro">
                        <option value="">Todos os status</option>
                        <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="Em Andamento" {{ request('status') == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                        <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                    </select>

                    <button type="submit">Filtrar</button>

                    @if(request()->hasAny(['busca', 'dataInicioFiltro', 'dataFimFiltro', 'categoria', 'status']))
                        <a href="{{ route('tarefas.index') }}" class="limpar-filtro">Limpar</a>
                    @endif
                </form>

                <div id="formNovaTarefa" class="hidden">
                    <form action="{{ route('tarefas.store') }}" method="post">
                        @csrf
                        <input type="text" name="titulo" placeholder="Título" required>
                        <input type="text" name="descricao" placeholder="Descrição" required>
                        <input type="date" name="dataInicio" required>
                        <input type="date" name="dataTermino" required>

                        <label>Prioridade:</label>
                        <input type="radio" name="prioridade" value="Baixa" required> Alta
                        <input type="radio" name="prioridade" value="Média" required> Média
                        <input type="radio" name="prioridade" value="Alta" required> Baixa

                        <label>Status:</label>
                        <input type="radio" name="status" value="Pendente" required> Pendente
                        <input type="radio" name="status" value="Em Progresso" required> Em Progresso
                        <input type="radio" name="status" value="Concluída" required> Concluída

                        <input type="text" name="categoria" placeholder="Categoria" required>

                        <button type="submit">Cadastrar</button>
                    </form>

                    @if(session('success'))
                        <p style="color: green;">{{ session('success') }}</p>
                    @endif
                </div>

                <div>
                    <ul>
                        @forelse($tarefas as $tarefa)
                            <li class="tarefa-item prioridade-{{ strtolower($tarefa->prioridade) }}">
                                <div class="tarefa-info">
                                    <strong>{{ $tarefa->titulo }}</strong>
                                    <p>{{ $tarefa->descricao }}</p>
                                    <span class="tarefa-categoria">{{ $tarefa->categoria }}</span>
                                    <span class="tarefa-status">{{ $tarefa->status }}</span>
                                    <span class="tarefa-prioridade">{{ $tarefa->prioridade }}</span>
                                    <span class="tarefa-datas">
                                        {{ \Carbon\Carbon::parse($tarefa->dataInicio)->format('d/m') }}
                                        →
                                        {{ \Carbon\Carbon::parse($tarefa->dataTermino)->format('d/m') }}
                                    </span>
                                </div>
                                <div class="tarefa-acoes">
                                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Excluir esta tarefa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><i data-lucide="trash-2"></i></button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li>Nenhuma tarefa cadastrada ainda.</li>
                        @endforelse
                    </ul>
                </div>

            </div>  

        </div>
    </section>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
