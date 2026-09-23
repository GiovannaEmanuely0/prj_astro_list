<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrotask — Organize sua órbita de tarefas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/welcome.css')}}">
</head>
<body>
 
<canvas id="stars"></canvas>
 
<div class="content">
 
  <nav>
    <div class="logo">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="url(#lg)"/>
        <defs><linearGradient id="lg" x1="3" y1="3" x2="21" y2="21"><stop stop-color="#9b7bff"/><stop offset="1" stop-color="#f0578b"/></linearGradient></defs>
      </svg>
      Astrotask
    </div>
    <div class="nav-links">
      <a href="#recursos">Recursos</a>
      <a href="#como-funciona">Como funciona</a>
      <a href="#visual">Visão geral</a>
    </div>
    <div class="nav-actions">
      <a class="btn-ghost" href="{{ route('login') }}">Entrar</a>
      <a class="btn-primary" href="{{ url('cadastrar') }}">Criar conta</a>
    </div>
  </nav>
 
  <!-- HERO -->
  <header class="hero">
    <div>
      <div class="eyebrow-badge"><span class="dot"></span>Novo: prazos com lembretes automáticos</div>
      <h1>Sua lista de tarefas, <span class="grad">em órbita estável</span>.</h1>
      <p class="sub">Astrotask organiza trabalho, estudos e vida pessoal em um só lugar, com prioridades claras e prazos que você realmente acompanha.</p>
      <div class="hero-actions">
        <a class="btn-primary btn-large" href="#">Começar de graça</a>
        <a class="btn-secondary" href="#visual">Ver como funciona</a>
      </div>
      <div class="hero-stats">
        <div>
          <div class="stat-num">12k+</div>
          <div class="stat-label">tarefas concluídas por semana</div>
        </div>
        <div>
          <div class="stat-num">3</div>
          <div class="stat-label">categorias por padrão</div>
        </div>
        <div>
          <div class="stat-num">100%</div>
          <div class="stat-label">gratuito para começar</div>
        </div>
      </div>
    </div>
 
    <div class="hero-visual" aria-hidden="true">
      <div class="orbit-ring ring-2"></div>
      <div class="orbit-ring ring-1"></div>
      <div class="core-badge">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="#fff"/>
        </svg>
      </div>
      <div class="float-card card-1">
        <div class="fc-title">Revisar boletins</div>
        <span class="fc-tag priority-alta">Alta prioridade</span>
      </div>
      <div class="float-card card-2">
        <div class="fc-title">Relatório semanal</div>
        <span class="fc-tag">Em progresso</span>
      </div>
      <div class="float-card card-3">
        <div class="fc-title">Cadastro atualizado</div>
        <span class="fc-tag priority-media">Concluída</span>
      </div>
    </div>
  </header>
 
  <!-- FEATURES -->
  <section id="recursos">
    <div class="section-inner">
      <div class="section-head">
        <h2>Três categorias, uma rotina inteira</h2>
        <p>Cada tarefa entra na órbita certa. Você define as categorias, o Astrotask cuida de manter tudo visível.</p>
      </div>
      <div class="features-grid">
        <div class="feature-card f1">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
          </div>
          <h3>Trabalho</h3>
          <p>Prazos de equipe, revisões e entregas, com prioridade visível à primeira vista.</p>
          <div class="feature-count"><span class="n">4</span><span class="u">tarefas ativas</span></div>
        </div>
        <div class="feature-card f2">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          </div>
          <h3>Estudos</h3>
          <p>Leituras, provas e projetos organizados por data, sem depender da memória.</p>
          <div class="feature-count"><span class="n">3</span><span class="u">tarefas ativas</span></div>
        </div>
        <div class="feature-card f3">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/></svg>
          </div>
          <h3>Pessoal</h3>
          <p>Compromissos e lembretes do dia a dia, longe da bagunça do trabalho.</p>
          <div class="feature-count"><span class="n">2</span><span class="u">tarefas ativas</span></div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- PREVIEW -->
  <section id="visual">
    <div class="section-inner">
      <div class="section-head">
        <h2>Tudo que importa, em uma tela</h2>
        <p>Busca, filtros por data, categoria e status. Cada tarefa mostra sua prioridade e o intervalo de execução.</p>
      </div>
      <div class="preview-wrap">
        <div class="preview-frame">
          <div class="preview-dots"><span></span><span></span><span></span></div>
 
          <div class="preview-row">
            <div class="preview-row-left">
              <div class="preview-bar" style="background:#f0578b"></div>
              <div>
                <div class="pt-title">Atualizar medidas protetivas</div>
                <div class="pt-desc">Verificar vencimentos próximos · 04/08 → 06/08</div>
              </div>
            </div>
            <div class="preview-tags">
              <span class="ptag">Pendente</span>
              <span class="ptag high">Alta</span>
            </div>
          </div>
 
          <div class="preview-row">
            <div class="preview-row-left">
              <div class="preview-bar" style="background:#7c5cfc"></div>
              <div>
                <div class="pt-title">Revisar boletins de ocorrência</div>
                <div class="pt-desc">Analisar registros das últimas 24h · 04/08 → 05/08</div>
              </div>
            </div>
            <div class="preview-tags">
              <span class="ptag">Em progresso</span>
              <span class="ptag high">Alta</span>
            </div>
          </div>
 
          <div class="preview-row">
            <div class="preview-row-left">
              <div class="preview-bar" style="background:#2ecf8f"></div>
              <div>
                <div class="pt-title">Emitir relatório semanal</div>
                <div class="pt-desc">Reunir dados da semana · 04/08 → 08/08</div>
              </div>
            </div>
            <div class="preview-tags">
              <span class="ptag">Em progresso</span>
              <span class="ptag">Baixa</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- HOW IT WORKS -->
  <section id="como-funciona">
    <div class="section-inner">
      <div class="section-head">
        <h2>Como funciona</h2>
        <p>Três passos para sair da lista mental e entrar numa rotina com prazos que se cumprem.</p>
      </div>
      <div class="steps">
        <div class="step">
          <div class="step-num">1</div>
          <h3>Crie sua tarefa</h3>
          <p>Título, descrição, categoria e prazo. Leva menos de dez segundos.</p>
        </div>
        <div class="step">
          <div class="step-num">2</div>
          <h3>Defina a prioridade</h3>
          <p>Alta, média ou baixa — o Astrotask ordena sua tela por urgência real.</p>
        </div>
        <div class="step">
          <div class="step-num">3</div>
          <h3>Acompanhe até concluir</h3>
          <p>Filtre por status e data, e veja o progresso se acumular todo dia.</p>
        </div>
      </div>
    </div>
  </section>
 
  <!-- CTA -->
  <div class="cta-band">
    <div class="cta-inner">
      <h2>Coloque sua rotina em órbita hoje</h2>
      <p>Sem cartão de crédito. Comece a organizar suas tarefas em menos de um minuto.</p>
      <div class="cta-actions">
        <a class="btn-primary btn-large" href="{{ url('/cadastrar') }}">Criar conta gratuita</a>
        <a class="btn-secondary" href="{{ route('login') }}">Já tenho conta</a>
      </div>
    </div>
  </div>
 
  <footer>
    <div class="footer-inner">
      <div class="logo" style="font-size:15px;">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="#7c5cfc"/>
        </svg>
        Astrotask
      </div>
      <div class="footer-links">
        <a href="#">Privacidade</a>
        <a href="#">Termos</a>
        <a href="#">Contato</a>
      </div>
      <div>© 2026 Astrotask</div>
    </div>
  </footer>
 
</div>
 
<script>
  // starfield — single orchestrated ambient layer, no per-element scroll effects
  const canvas = document.getElementById('stars');
  const ctx = canvas.getContext('2d');
  let w, h, stars;
 
  function resize(){
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
    const count = Math.floor((w*h)/9000);
    stars = Array.from({length:count}, () => ({
      x: Math.random()*w,
      y: Math.random()*h,
      r: Math.random()*1.3 + 0.3,
      a: Math.random()*0.6 + 0.15,
      speed: Math.random()*0.015 + 0.003
    }));
  }
 
  function draw(t){
    ctx.clearRect(0,0,w,h);
    for(const s of stars){
      const twinkle = s.a + Math.sin(t*s.speed + s.x) * 0.15;
      ctx.beginPath();
      ctx.arc(s.x, s.y, s.r, 0, Math.PI*2);
      ctx.fillStyle = `rgba(220,214,255,${Math.max(0,twinkle)})`;
      ctx.fill();
    }
    requestAnimationFrame(draw);
  }
 
  window.addEventListener('resize', resize);
  resize();
  requestAnimationFrame(draw);
</script>
 
</body>
</html>
