<div class="sidebar">

    <!-- TOPO -->
    <div class="sidebar_top">
        <div class="sidebar_logo">
            <img src="{{ asset('img/logoAstrolist/logoFuture-removebg-preview.png') }}" class="logo">
            <h1>Astrolist</h1>
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
    
    <!-- MEIO -->
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
    
    <!-- FOOTER -->
    <div class="sidebar_footer">
        <div onclick="abrirModal()">
                <i data-lucide="circle-user" class="conta"></i>
                <h1>Usuário</h1>
        </div>
    </div>

    <div id="overlay" class="overlay">
        <div class="modal">
            @include('nivelCadastro.cadastro');
        </div>
    </div>

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