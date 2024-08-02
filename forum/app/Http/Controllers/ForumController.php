<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;

class ForumController extends Controller
{
    //mostra os posts
    public function index() {
        $posts = Post::all()->sortByDesc('data');
        return view('forum', ["posts"=>$posts]);
    }

    //Vai para a página de criação dos posts
    public function create(){

        return view('create');
    }

    //Upload do post
    public function store(Request $request){
        $post = new Post;

        $post->titulo = $request->titulo;
        $post->texto = $request ->texto;

        $user = auth()->user();
        $post->id_autor = $user->id;

        $post->data = date("Y/m/d H:i:s", time());

        //Upload de imagem
        if($request->hasFile("imagem") && $request->file("imagem")->isValid()){
            echo "alert('Há imagem');";

            $request_imagem = $request->imagem;

            $extension = $request_imagem->extension();
            $imagem_nome = md5($request_imagem->getClientOriginalName() . strtotime("now").".". $extension);

            $request_imagem->move(public_path('img/posts'), $imagem_nome);

            $post->imagem = $imagem_nome;
        }
        else{
            echo "alert('Não há imagem');";
        }

        $post->save();

        return redirect('/');
    }

    //Mostra o post específico e as respostas
    public function show($id) {
        $post = Post::findOrFail($id);
        $respostas = Reply::where('id_post','=',$id)->get()->sortBy('data');
        return view('post', ["post"=>$post, "respostas"=>$respostas]);
    }

    //Vai para a página de criação das respostas
    public function reply($id){

        return view('/reply', ["id"=>$id]);
    }

    //Criação das respostas
    public function storeReply(Request $request){
        $reply = new Reply;

        $reply ->id_post = $request ->post_id;
        $reply->titulo = $request->titulo;
        $reply->texto = $request ->texto;

        $reply->data = date("Y/m/d H:i:s", time());

        $user = auth()->user();
        $reply->id_autor = $user->id;

        //Upload de imagem
        if($request->hasFile("imagem") && $request->file("imagem")->isValid()){
            echo "alert('Há imagem');";

            $request_imagem = $request->imagem;

            $extension = $request_imagem->extension();
            $imagem_nome = md5($request_imagem->getClientOriginalName() . strtotime("now") . ".". $extension);

            $request_imagem->move(public_path('img/posts'), $imagem_nome);

            $reply->imagem = $imagem_nome;
        }
        else{
            echo "alert('Não há imagem');";
        }

        $reply->save();

        return redirect('/post/'.$request->post_id);
    }

    public function dashboard(){
        $user = auth()->user();
        $posts = Post::where('id_autor', "=", $user->id)->get();
        $replies = Reply::where('id_autor', "=", $user->id)->get();

        return view('dashboard', ['posts'=>$posts, 'replies'=>$replies]);
    }
}
