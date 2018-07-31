<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


         /*titulo' => $titulo,
        'slug' => str_slug($titulo),   // convertimos cualquier string a slug
        'extracto' => $faker->text(200),
        'cuerpo' => $faker->text(500),   // texto de 500 caracteres
        'status' => $faker->randomElement(['BORRADOR','PUBLICADO']),
        'imagen' => $faker->imageUrl($width = 640, $height = 480),
*/


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
        $posts = Etiqueta::orderBy('id')->paginate(5);
        // ['tags' => $tags]
        //dd($etiquetas);
        return view('userBlog.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userBlog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validarDatos = $request->validate([
            'nombre' => 'required|max:150',
        ]);

        
               
        //$etiqueta = Etiqueta::create($request->all());
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->input('nombre');  // recibimos el contenido 
        $etiqueta->slug = str_slug($etiqueta->nombre);
        $etiqueta->save();
        $etiquetas = Etiqueta::orderBy('id', 'desc')->paginate(5);
        // ['tags' => $tags]
        //dd($etiquetas);
        return view('userBlog.etiquetas.index',compact('etiquetas'))->with('info','Etiqueta creada con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
