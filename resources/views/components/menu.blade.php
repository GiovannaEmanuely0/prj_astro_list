<div class="sidebar">

    <div class="sidebar_top">
    <div class="sidebar_logo">
       <a href="{{ route('tarefas.index') }}">
           <img src="{{ asset('img/logoAstrolist/logoFuture-removebg-preview.png') }}" class="logo">
           <h1>Astrotask</h1>
       </a> 
    </div>

    <div class="sidebar_menu">
        <div class="menu_item active">
            <i data-lucide="alarm-clock"></i>
            <span>Hoje</span>
            <p>5</p>
        </div>
        <div class="menu_item">
            <i data-lucide="refresh-ccw"></i>
            <span>Upcoming</span>
            <p>3</p>
        </div>
        <div class="menu_item">
            <i data-lucide="circle-check-big"></i>
            <span>Concluído</span>
            <p>12</p>
        </div>
    </div>
</div>

<div class="sidebar_middle">
    <div class="ti_cate">
        <h1>Categorias</h1>
        <button class="btn">+</button>
    </div>

    <div class="list_cate">
        <div class="cate_item">
            <span>Trabalho</span>
            <p>4</p>
        </div>
        <div class="cate_item">
            <span>Estudos</span>
            <p>3</p>
        </div>
        <div class="cate_item">
            <span>Pessoal</span>
            <p>2</p>
        </div>
    </div>
</div>

<div class="sidebar_footer">
   @auth
        <a href="{{ route('usuario.show', Auth::id()) }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none; color: inherit;">
            <i data-lucide="circle-user" class="conta"></i>
            <h1>{{ Auth::user()->nome }}</h1>
        </a>
    @else
        <div onclick="abrirModal()">
            <i data-lucide="circle-user" class="conta"></i>
            <h1>Usuário</h1>
        </div>
    @endauth
</div>

@guest
    <div id="overlay" class="overlay">
        <div class="modal">
            @include('nivelCadastro.cadastro')
        </div>
    </div>
@endguest
</div>
<link rel="stylesheet" href="{{url('css/menu.css')}}">
<script>
    function abrirModal() {
        document.getElementById('overlay').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function fecharModal() {
        document.getElementById('overlay').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
        document.getElementById('overlay').addEventListener('click', function(e) {
        if (e.target === this) {
            fecharModal();
        }
    });
</script>
