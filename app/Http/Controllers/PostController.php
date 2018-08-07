<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use App\Etiqueta;
use App\User;

        



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        
        $posts = Post::orderBy('id')->paginate(10);
        // ['tags' => $tags]
        //dd($posts);
        //$autor = User::all()->where('id',$id)->first();
        return view('userBlog.posts.index',compact(['posts']));
    }

    public function indexado($id){
        $usuario_id = User::where('id',$id)->pluck('id')->first();
        //dd($usuario_id);
        $posts = Post::orderBy('id')
        // traemos los post del usuario logueado
        ->where('user_id',$usuario_id)
        ->paginate(10);
        // ['tags' => $tags]
        //dd($posts);
        $autor = User::all()->where('id',$id)->first();
        return view('/userBlog/posts/indexado',compact(['posts','autor']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // para crear una entrada, necesito las categorías y las etiquetas
    public function create()
    {
        // traemos el id y el nombre de las categorías
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre','id');
        // traemos las etiquetas con un get, para luego mostrarlas con un foreach
        $etiquetas = Etiqueta::orderBy('nombre', 'ASC')->get();
        // pasamos catagorías y etiquetas a la vista
        return view('userBlog.posts.create',compact('categorias','etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /*titulo' => $titulo,
        'slug' => str_slug($titulo),   // convertimos cualquier string a slug
        'extracto' => $faker->text(200),
        'cuerpo' => $faker->text(500),   // texto de 500 caracteres
        'status' => $faker->randomElement(['BORRADOR','PUBLICADO']),
        'imagen' => $faker->imageUrl($width = 640, $height = 480),*/

    public function store(Request $request)
    {
        $validarDatos = $request->validate([
            'titulo' => 'required|max:150',
            'extracto' => 'required|max:300',
            'cuerpo' => 'required|max:1000',
            'status' => 'required'
        ]);

        
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');  // ponemos al archivo en una variable
            $nombre = '/img/portada/' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = 'img/portada/portada.jpg';
        }        

        //dd($request);
              
        //$post = post::create($request->all());
        $post = new Post();
        $post->titulo = $request->input('titulo');  // recibimos el contenido 
        $post->slug = str_slug($post->titulo);
        $post->extracto = $request->input('extracto');
        $post->cuerpo = $request->input('cuerpo');
        $post->status = $request->input('status');
        $post->user_id = $request->input('user_id');
        $post->imagen = $nombre;
        $post->categoria_id = $request->input('categoria_id');

        
        $post->save();
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        
        $autor = User::all()->where('id',$post->user_id)->first();
        // ['tags' => $tags]
        //dd($posts);
        return view('userBlog.posts.index',compact('posts'))->with('info','post creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // obtenemos la post con id
        $post = Post::find($id);
        $autor = User::all()->where('id',$post->user_id)->first();

        // mostramos la vista 
        return view('userBlog.posts.show',compact(['post','autor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre','id');
        // traemos las etiquetas con un get, para luego mostrarlas 
        $etiquetas = Etiqueta::orderBy('nombre', 'ASC')->get();
        // obtenemos la post con id
        $post = Post::find($id);
        $autor = User::all()->where('id',$post->user_id)->first();
        
        // mostramos la vista 
        return view('userBlog.posts.edit',compact('post','categorias','autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // obtenemos la post a modificar
        $post = Post::find($id);
        // llenamos los datos con fill y request
        // salvo la imagen y el slug

        $post->fill($request->except(['imagen', 'slug'])); 
        //dd($post);
        // llenamos el slug
        $post->slug = str_slug($post->titulo);
        //dd($post);

        if ($request->hasFile('portada')) {
            $archivo = $request->file('portada');  // ponemos al archivo en una variable
            $nombre = '/img/portada/' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);;    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = 'img/portada/portada.jpg';
        }

        // llenamos la foto
        $post->imagen = $nombre;
        //dd($post);
        // salvamos y retomamos a la vista de la post con mensaje incluido
        $post->save();
        return redirect()->route('posts.show',[$post])->with('info','post actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id)->delete();;
        //$autor = User::all()->where('id',$post->user_id)->first();
        //$posteos = Post::all();
        
        // retornamos a la vista anterior
        //return view('userBlog.posts.index',compact(['posts','autor']))->with('info','Posteo eliminado correctamente');
        return redirect()->route('home')->with('info','post actualizado con éxito');
        
    }
}
