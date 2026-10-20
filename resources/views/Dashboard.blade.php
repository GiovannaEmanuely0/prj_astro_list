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
                    <div class="form-cabecalho">
                        <h2>Nova tarefa</h2>
                        <p>Campos marcados com <span class="obrigatorio">*</span> são obrigatórios.</p>
                    </div>

                    <form action="{{ route('tarefas.store') }}" method="post">
                        @csrf

                        <fieldset class="grupo">
                            <legend>Informações</legend>

                            <label class="campo">
                                <span class="campo-label">Título <span class="obrigatorio">*</span></span>
                                <input type="text" name="titulo" placeholder="Ex.: Entregar relatório mensal" value="{{ old('titulo') }}" required>
                                @error('titulo')
                                    <span class="erro">{{ $message }}</span>
                                @enderror
                            </label>

                            <label class="campo">
                                <span class="campo-label">Descrição <span class="obrigatorio">*</span></span>
                                <input type="text" name="descricao" placeholder="Ex.: Reunir os dados e enviar ao gestor" value="{{ old('descricao') }}" required>
                                @error('descricao')
                                    <span class="erro">{{ $message }}</span>
                                @enderror
                            </label>

                            <label class="campo">
                                <span class="campo-label">Categoria <span class="obrigatorio">*</span></span>
                                <input type="text" name="categoria" placeholder="Ex.: Trabalho, Estudos, Pessoal" value="{{ old('categoria') }}" required>
                                @error('categoria')
                                    <span class="erro">{{ $message }}</span>
                                @enderror
                            </label>
                        </fieldset>

                        <fieldset class="grupo grupo-datas">
                            <legend>Prazo</legend>

                            <label class="campo">
                                <span class="campo-label">Data de início</span>
                                <input type="date" name="dataInicio" value="{{ old('dataInicio') }}" required>
                                @error('dataInicio')
                                    <span class="erro">{{ $message }}</span>
                                @enderror
                            </label>

                            <label class="campo">
                                <span class="campo-label">Data de término</span>
                                <input type="date" name="dataTermino" value="{{ old('dataTermino') }}" required>
                                @error('dataTermino')
                                    <span class="erro">{{ $message }}</span>
                                @enderror
                            </label>
                        </fieldset>

                        <fieldset class="grupo">
                            <legend>Prioridade <span class="obrigatorio">*</span></legend>
                            <div class="opcoes">
                                <label class="opcao opcao-alta">
                                    <input type="radio" name="prioridade" value="Alta" required>
                                    <span>Alta</span>
                                </label>
                                <label class="opcao opcao-media">
                                    <input type="radio" name="prioridade" value="Média" required>
                                    <span>Média</span>
                                </label>
                                <label class="opcao opcao-baixa">
                                    <input type="radio" name="prioridade" value="Baixa" required>
                                    <span>Baixa</span>
                                </label>
                            </div>
                        </fieldset>

                        <fieldset class="grupo">
                            <legend>Status <span class="obrigatorio">*</span></legend>
                            <div class="opcoes">
                                <label class="opcao">
                                    <input type="radio" name="status" value="Pendente" required>
                                    <span>Pendente</span>
                                </label>
                                <label class="opcao">
                                    <input type="radio" name="status" value="Em Progresso" required>
                                    <span>Em Progresso</span>
                                </label>
                                <label class="opcao">
                                    <input type="radio" name="status" value="Concluída" required>
                                    <span>Concluída</span>
                                </label>
                            </div>
                        </fieldset>

                        <button type="submit">Cadastrar tarefa</button>
                    </form>

                    @if(session('success'))
                        <p class="msg-sucesso">{{ session('success') }}</p>
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
