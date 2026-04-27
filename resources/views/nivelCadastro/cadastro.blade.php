<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="{{url('css/cadastro.css')}}">
</head>
<body>
    <section class="secao_cadastro">
        <h1 class="title_cadastro">Cadastre-se</h1>
        <form action="/cadastrar" method="post" class="form_cadastro">
            @csrf
            <div class="groupInput">
                <input type="text" name="txNome" id="" required>
                <label for="txNome">Nome</label>
            </div>
            <div class="groupInput">
                <input type="email" name="txEmail" id="" required>
                <label for="txEmail">E-mail</label>
            </div>
            <div class="groupInput">
                <input type="password" name="txSenha" id="" required>
                <label for="txSenha">Senha</label>
            </div>
            <div class="groupInput">
                <input type="password" name="txSenha_confirmation" id="" required>
                <label for="txSenha_confirmation">Confirmar senha</label>
            </div>
            <div><p class="link"><a href="#">Já é cadastrado? Faça Login</a></p>
                <input type="submit" value="Enviar" class="botao"></div>
        </form>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $erro)
                    <p class="erro_email">{{ $erro }}</p>
                @endforeach
            </div>
        @endif
    </section>
</body>
</html>