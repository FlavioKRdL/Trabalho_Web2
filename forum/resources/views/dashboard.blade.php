<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    
    <link rel="stylesheet" href="/css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <br><br>

    <h4>Posts: </h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">título</th>
                <th scope="col">texto</th>
                <th scope="col">data</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td scope="col">{{$loop->index+1}}</td>
                    <td scope="col"> <a href="/post/{{$post->id}}">{{$post->titulo}}</a></td>
                    <td scope="col">{{$post->texto}}</td>
                    <td scope="col">{{$post->data}}</td>
                </tr>
            @endforeach
    </tbody>
    </table>

    <br>

    <h4>Respostas:</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">título</th>
                <th scope="col">texto</th>
                <th scope="col">data</th>
            </tr>
        </thead>

        <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td scope="col">{{$loop->index+1}}</td>
                    <td scope="col"> <a href="/post/{{$post->id}}">{{$reply->titulo}}</a></td>
                    <td scope="col">{{$reply->texto}}</td>
                    <td scope="col">{{$reply->data}}</td>
                </tr>
            @endforeach
    </tbody>
    </table>


    <br><br><br>
</body>
</html>