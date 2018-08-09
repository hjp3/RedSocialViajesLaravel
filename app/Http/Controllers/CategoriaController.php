<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id')->paginate(5);
        // ['tags' => $tags]
        //dd($etiquetas);
        return view('userBlog.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userBlog.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        
        // validar los datos
        $validarDatos = $request->validate([
            'nombre' => 'required|max:150',
            'cuerpo' => 'required|max:1500'
        ]);

                       
        //$etiqueta = Etiqueta::create($request->all());
        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');  // recibimos el contenido 
        $categoria->slug = str_slug($categoria->nombre);
        $categoria->cuerpo = $request->input('cuerpo');
        $categoria->save();
        $categorias = Categoria::orderBy('id', 'desc')->paginate(5);
        // ['tags' => $tags]
        //dd($etiquetas);
        return view('userBlog.categorias.index',compact('categorias'))->with('info','Categoria creada con éxito');;
        // antes de guardar, damos la chance de cambiar los datos
        // redireccionamos con el atributo id
        // le pasamos una variable de sesión flash, el texto desaparece cuando se actualiza
        //return redirect()->route('etiquetas.edit', $etiqueta->id)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // obtenemos la etiqueta con id
        $categoria = Categoria::find($id);

        // mostramos la vista 
        return view('userBlog.categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // obtenemos la etiqueta con id
        $categoria = Categoria::find($id);

        // mostramos la vista 
        return view('userBlog.categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // obtenemos la etiqueta a modificar
        $categoria = Categoria::find($id);

        // valida datos

        // la llenamos con los datos del formulario, que es sólo el nombre
        $categoria->nombre = $request->input('nombre');
        $categoria->slug = str_slug($categoria->nombre);
        $categoria->cuerpo = $request->input('cuerpo');

        // salvamos y retomamos a la vista de la categoria con mensaje incluido
        $categoria->save();
        return redirect()->route('categorias.show',[$categoria])->with('info','Categoría actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id)->delete();

        // retornamos a la vista anterior
        return back()->with('info','Eliminada correctamente');
    }
}
