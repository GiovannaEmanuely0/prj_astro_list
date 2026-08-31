<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar — Astrotask</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
</head>
<body>
 
<canvas id="stars"></canvas>
 
<div class="shell">
 
  <!-- LEFT VISUAL PANEL -->
  <div class="panel">
    <div class="logo">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="url(#lg)"/>
        <defs><linearGradient id="lg" x1="3" y1="3" x2="21" y2="21"><stop stop-color="#9b7bff"/><stop offset="1" stop-color="#f0578b"/></linearGradient></defs>
      </svg>
      Astrotask
    </div>
 
    <div class="panel-visual" aria-hidden="true">
      <div class="orbit-ring ring-2"></div>
      <div class="orbit-ring ring-1"></div>
      <div class="core-badge">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 17L10 4L12.5 9.5L21 3L15.5 13.5L21 21L11.5 16.5L3 17Z" fill="#fff"/>
        </svg>
      </div>
      <div class="float-card card-1">
        <div class="fc-title">Relatório semanal</div>
        <span class="fc-tag">Em progresso</span>
      </div>
      <div class="float-card card-2">
        <div class="fc-title">Cadastro atualizado</div>
        <span class="fc-tag done">Concluída</span>
      </div>
    </div>
 
    <div class="panel-quote">
      <p>"Desde que passei a usar o Astrotask, nenhum prazo passa despercebido."</p>
      <div class="who">Penelope — usuária desde 2025</div>
    </div>
  </div>
 
  <!-- RIGHT FORM PANEL -->
  <div class="form-panel">
    <div class="form-box">
      <h1>Bem-vinda de volta</h1>
      <p class="sub">Ainda não tem conta? <a href="{{ url('/cadastrar') }}">Criar conta</a></p>
 
      <div class="divider">ou entre com e-mail</div>
 
      <form method="post" action="/fazerLogin">
        @csrf
        <div class="field">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" value="{{ old('email')}}" placeholder="voce@exemplo.com" required>
        </div>
        <div class="field">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="password" placeholder="••••••••" required>
        </div>
        <div class="row-between">
          <!-- <a href="#">Esqueceu a senha?</a> -->
        </div>
        <button class="btn-primary" type="submit">Entrar</button>
      </form>
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
