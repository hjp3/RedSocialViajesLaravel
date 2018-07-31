<?php

namespace App\Http\Controllers;

use App\Etiqueta;
use Illuminate\Http\Request;
use App\Http\Requests\EtiquetaUpdateRequest;
use App\Http\Requests\EtiquetaStoreRequest;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // le ponemos un filtro middleware, hay que estar logueado para editar el blog
    // protegemos a todos los métodos
    function __construct()
    {
        $this->middleware('auth');
    }

    // mostramos a todas las etiquetas paginadas
    public function index()
    {
        $etiquetas = Etiqueta::orderBy('id')->paginate(5);
        // ['tags' => $tags]
        //dd($etiquetas);
        return view('userBlog.etiquetas.index',compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // retornamos el formulario
    public function create()
    {
        return view('userBlog.etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // guardamos a todos los datos recibidos
    // pero los atributos nombre y slug
    public function store(Request $request)
    {
        //dd($request);
        
        // validar los datos
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
        // antes de guardar, damos la chance de cambiar los datos
        // redireccionamos con el atributo id
        // le pasamos una variable de sesión flash, el texto desaparece cuando se actualiza
        //return redirect()->route('etiquetas.edit', $etiqueta->id)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        // obtenemos la etiqueta con id
        $etiqueta = Etiqueta::find($id);

        // mostramos la vista 
        return view('userBlog.etiquetas.show',compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */

    
    // mostramos la vista edit
    public function edit($id)
    {
        // obtenemos la etiqueta con id
        $etiqueta = Etiqueta::find($id);

        // mostramos la vista 
        return view('userBlog.etiquetas.edit',compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */

    // actualiza los datos que están en la base de datos
    public function update(Request $request,$id)
    {
        // obtenemos la etiqueta a modificar
        $etiqueta = Etiqueta::find($id);

        // valida datos

        // la llenamos con los datos del formulario, que es sólo el nombre
        $etiqueta->nombre = $request->input('nombre');
        $etiqueta->slug = str_slug($etiqueta->nombre);

        // salvamos y retomamos a la vista de la etiqueta con mensaje incluido
        $etiqueta->save();
        return redirect()->route('etiquetas.show',[$etiqueta])->with('info','Etiqueta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::find($id)->delete();

        // retornamos a la vista anterior
        return back()->with('info','Eliminada correctamente');
    }
}
