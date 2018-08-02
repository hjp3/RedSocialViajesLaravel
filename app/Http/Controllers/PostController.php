<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categoria;
use App\Etiqueta;

        



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
        $posts = Post::orderBy('id')->paginate(5);
        // ['tags' => $tags]
        //dd($posts);
        return view('userBlog.posts.index',compact('posts'));
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

        dd($request);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');  // ponemos al archivo en una variable
            $nombre = 'img/portada' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = 'img/portada/portada.jpg';
        }        
               
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
        // ['tags' => $tags]
        //dd($posts);
        return view('userBlog.posts.index',compact('posts'))->with('info','post creada con éxito');;
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

        // mostramos la vista 
        return view('userBlog.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('name','id');
        // traemos las etiquetas con un get, para luego mostrarlas 
        $etiquetas = Etiqueta::orderBy('nombre', 'ASC')->get();
        // obtenemos la post con id
        $post = Post::find($id);

        // mostramos la vista 
        return view('userBlog.posts.edit',compact('post','ccategorias','etiquetas'));
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
        
        // llenamos el slug
        $post->slug = str_slug($post->titulo);


        if ($request->hasFile('portada')) {
            $archivo = $request->file('portada');  // ponemos al archivo en una variable
            $nombre = 'img/portada' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = 'img/portada/portada.jpg';
        }

        // llenamos la foto
        $post->imagen = $nombre;

        // salvamos y retomamos a la vista de la post con mensaje incluido
        $post->save();
        return redirect()->route('etiquetas.show',[$post])->with('info','post actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();

        // retornamos a la vista anterior
        return back()->with('info','Eliminada correctamente');
    }
}
