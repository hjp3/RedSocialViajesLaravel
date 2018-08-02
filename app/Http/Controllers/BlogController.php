<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use App\Etiqueta;
use App\User;

class BlogController extends Controller
{
    public function blog()
    {
         $posteos = Post::orderBy('id','DESC')->where('status','PUBLICADO')->paginate(3);
    	 return  view('blog.posts',compact('posteos'));


    }


    public function blogUsuario(){
        $posteos = Post::orderBy('id','DESC')
        // traemos los post del usuario logueado
        ->where('user_id','auth()->user()->id')
        ->paginate(3);
        
         return  view('blog.user_posts',compact('posteos'));
    }


    public function post($id){
    	$post = Post::find($id);
    	return view('blog.post',compact('post'));
    }

    // filtra los posteos según la categoría,la relación uno a muchos
    public function categoria($slug){
    	// recorremos la coleccion categoría y cuando concide el slug de la misma con el slug parámetro, obtenemos el id
    	$idcategoria = Categoria::where('slug',$slug)->pluck('id')->first();
    	$nombre_cat = Categoria::where('slug',$slug)->pluck('nombre')->first();
    	// con la idcategoría, recorremos la collection posts y todo post cuyo atributo categoria_id coincide con idcategoría es alamacenado
    	$posteos = Post::where('categoria_id',$idcategoria)->orderBy('id','DESC')->where('status','PUBLICADO')->paginate(3);
    	// vemos a esos posts en la vista específica
    	return  view('blog.posts_categoria',compact('posteos'))->with('categoria', $nombre_cat);
    }


    // filtar los posts de acuerdo a la etiqueta
    public function etiqueta($slug){
    	// obtenemos los posteos que entre sus etiquetas haya alguna que coincida con el sluq que le paso
    	$posteos = Post::whereHas('etiquetas',function($query) use($slug){
    		$query->where('slug',$slug);
    	})->orderBy('id','DESC')->where('status','PUBLICADO')->paginate(3);
    	$nombre_etiqueta = Etiqueta::where('slug',$slug)->pluck('nombre')->first();
    	// vemos a esos posts en la vista específica
    	return  view('blog.posts_etiqueta',compact('posteos'))->with('etiqueta',$nombre_etiqueta);
    }

    public function home($id){
    	
    }


}
