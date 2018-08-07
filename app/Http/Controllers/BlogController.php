<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use App\Etiqueta;
use App\User;
use Auth;


class BlogController extends Controller
{
    public function blog()
    {

         $posteos = Post::orderBy('id','DESC')->where('status','PUBLICADO')->paginate(3);
         // $idposteo = $poteos->pluck('user_id')->first();
         // $nombre_usuario = User::orderBy('id','DESC')->where('id',$idposteo)->first();
         $usuarios = User::all();
         return  view('blog.posts',compact(['posteos','usuarios']));


    }


    //muestra los posteos del usuario
    public function blogUsuario($id){
        $usuario_id = User::where('id',$id)->pluck('id')->first();
        //dd($usuario_id);
        $posteos = Post::orderBy('id','DESC')
        // traemos los post del usuario logueado
        ->where('user_id',$usuario_id)
        ->paginate(3);
        //dd($posteos);
        $autor = User::all()->where('id',$id)->first();
        return  view('blog.user_posts',compact(['posteos','autor']));
    }

    // muestra un posteo individual
    public function post($id){
    	$post = Post::find($id);
        $autor = User::all()->where('id',$post->user_id)->first();
        return view('blog.post',compact(['post','autor']));
    }




    // filtra los posteos según la categoría,la relación uno a muchos
    public function categoria($slug){
    	// recorremos la coleccion categoría y cuando concide el slug de la misma con el slug parámetro, obtenemos el id
    	$idcategoria = Categoria::where('slug',$slug)->pluck('id')->first();
    	$categoria = Categoria::find($idcategoria);
    	// con la idcategoría, recorremos la collection posts y todo post cuyo atributo categoria_id coincide con idcategoría es alamacenado
    	$posteos = Post::where('categoria_id',$idcategoria)->orderBy('id','DESC')->where('status','PUBLICADO')->paginate(5);
        $users = User::all();
        //dd($nombre_cat);
    	// vemos a esos posts en la vista específica
    	return  view('blog.posts_categoria',compact(['posteos','categoria','users']));
    }


    // filtar los posts de acuerdo a la etiqueta
    public function etiqueta($slug){
    	// obtenemos los posteos que entre sus etiquetas haya alguna que coincida con el sluq que le paso
    	$posteos = Post::whereHas('etiquetas',function($query) use($slug){
    		$query->where('slug',$slug);
    	})->orderBy('id','DESC')->where('status','PUBLICADO')->paginate(5);
    	$idEtiqueta = Etiqueta::where('slug',$slug)->pluck('id')->first();
        $etiqueta = Etiqueta::find($idEtiqueta);
        $users = User::all();
    	// vemos a esos posts en la vista específica
    	return  view('blog.posts_etiqueta',compact(['posteos','etiqueta','users']));
    }

    public function home($id){
    	
    }


}
