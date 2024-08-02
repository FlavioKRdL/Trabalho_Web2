<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar post</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header class="header1">
        <section class="tohome"> <a href="/">Forum</a> </section>
        <section class="logo"><h1 id="logo">ZYXXX</h1></section>
        <section class="userinfo">
            @guest
            <div>
                <a href="/login">Entrar</a>
            </div>
            <div>
                <a href="/register">Criar conta</a>
            </div>
            @endguest
            @auth
            <div>
                <a href="/dashboard">Meus posts</a>
            </div>
            <div>
                <form action="/logout" method="post">
                    @csrf
                    <a href="/logout" onclick="event.preventDefault();
                    this.closest('form').submit();">
                        Sair
                    </a>
                </form>
            </div>
            @endauth
        </section>
    </header>

    <br>

    @guest
        <h1>Você deve estar logado para criar um post</h1>
    @endguest

    @auth
    <form action="/" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-box">
            <div class="post-titulo"><input type="text" name="titulo" id="titulo" placeholder="Titulo"></div>
            <div class="post-corpo">
                <div class="corpo-imagem">
                    <label for="imagem">Imagem do post</label>
                    <input type="file" name="imagem" id="imagem">
                </div>
                <div class="corpo-texto">
                    <textarea name="texto" id="texto" cols="100" rows="10" placeholder="Digite o texto aqui"></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar post">
        </div>
    </form>
    @endauth

</body>
</html>