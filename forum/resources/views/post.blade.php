<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
    
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

    <section>
        <div style="text-align: center; font-size: larger;" ><a href="/reply/{{$post->id}}">Responda ao post</a></div>
    </section>

    <br><br>

    <div class="post-box">
        <div class="post-titulo">
            <div>
                <p>{{$post -> titulo}}  \\  {{$post->data}}</p>
            </div>
            <div style="text-align:right;">
                <p>Autor: {{$post->id_autor}}</p>
            </div>
        </div>
        <div class="post-corpo">
            <div class="corpo-imagem">
                <img class="corpo-imagem" src="/img/posts/{{$post->imagem}}" alt="{{$post->titulo}}">
            </div>
            <div class="corpo-texto">
                <p>{{$post -> texto}}</p>
            </div>
        </div>
        
        <div class="post-footer">
            <a href="/reply/{{$post->id}}" style="font-size: large; ">Responda ao post</a>
        </div>
    </div>

    <br>

    @foreach($respostas as $resposta)
    <div class="post-box">
        <div class="post-titulo">
            <div>
                <p>{{$resposta -> titulo}}  \\  {{$resposta->data}}</p>
            </div>
            <div style="text-align:right;">
                <p>Autor: {{$resposta->id_autor}}</p>
            </div>
        </div>
        <div class="post-corpo">
            <div class="corpo-imagem">
                <img class="corpo-imagem" src="/img/posts/{{$resposta->imagem}}" alt="{{$resposta->titulo}}">
            </div>
            <div class="corpo-texto">
                <p>{{$resposta -> texto}}</p>
            </div>
        </div>
    </div>
        
    <br>
    @endforeach

</body>
</html>