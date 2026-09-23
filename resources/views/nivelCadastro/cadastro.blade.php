<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta — Astrotask</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/cadastro.css')}}">
</head>
<body>
 
<canvas id="stars"></canvas>
 
<div class="shell">
 
  <!-- LEFT FORM PANEL -->
  <div class="form-panel">
    <div class="form-box">
      <div class="logo-top">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="url(#lg)"/>
          <defs><linearGradient id="lg" x1="3" y1="3" x2="21" y2="21"><stop stop-color="#9b7bff"/><stop offset="1" stop-color="#f0578b"/></linearGradient></defs>
        </svg>
        Astrotask
      </div>
 
      <h1>Crie sua conta</h1>
      <p class="sub">Já tem conta? <a href="{{ route('login') }}">Entrar</a></p>
 
      <div class="divider">ou cadastre-se com e-mail</div>
 
      <form action="/cadastrar" method="post">
        @csrf
        <div class="field">
          <label for="nome">Nome completo</label>
          <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
        </div>
        <div class="field">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" placeholder="voce@exemplo.com" required>
        </div>
        <div class="field">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>
          <div class="strength">
            <span class="on"></span><span class="on"></span><span></span><span></span>
          </div>
          <div class="strength-label">Força da senha: média</div>
        </div>
 
        <button class="btn-primary" type="submit">Criar conta</button>
      </form>
    </div>
  </div>
 
  <div class="panel">
    <h2>Tudo pronto em menos de um minuto.</h2>
    <p>Ao criar sua conta, você já começa com três categorias organizadas e um painel pronto para receber suas primeiras tarefas.</p>
 
    <div class="perk-list">
      <div class="perk">
        <div class="perk-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <div class="perk-text">
          <h3>Categorias prontas</h3>
          <p>Trabalho, estudos e pessoal já configurados para você começar.</p>
        </div>
      </div>
      <div class="perk">
        <div class="perk-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <div class="perk-text">
          <h3>Prazos com lembrete</h3>
          <p>Cada tarefa pode ter um intervalo de execução acompanhado automaticamente.</p>
        </div>
      </div>
      <div class="perk">
        <div class="perk-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <div class="perk-text">
          <h3>Sem cartão de crédito</h3>
          <p>O plano gratuito cobre tudo que você precisa para começar hoje.</p>
        </div>
      </div>
    </div>
  </div>
 
</div>
 
<script>
  const canvas = document.getElementById('stars');
  const ctx = canvas.getContext('2d');
  let w, h, stars;
 
  function resize(){
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
    const count = Math.floor((w*h)/10000);
    stars = Array.from({length:count}, () => ({
      x: Math.random()*w, y: Math.random()*h,
      r: Math.random()*1.2 + 0.3, a: Math.random()*0.55 + 0.15,
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
