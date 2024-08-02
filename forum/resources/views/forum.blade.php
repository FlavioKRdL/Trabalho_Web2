<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
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
        <div style="text-align: center; font-size: larger;" ><a href="/create">Criar post</a></div>
    </section>

    <br><br>

    <?php 
    use App\Models\User;
    ?>

    @foreach($posts as $post)
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
            <a href="/post/{{$post->id}}" style="font-size: large; ">Leia a discussão</a>
        </div>
    </div>
        
        <br><br>
    @endforeach
</body>
</html>