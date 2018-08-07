<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Viaje;
use App\User;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::all();  // traemos a todos los viajes
        return view('viaje.index', compact('viajes'));    // pasamos los viajes a la vista   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viaje.create');
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
            'titulo' => 'required|max:50',
            'portada' => 'required|image',
            'fecha_partida' => 'required|date|date_format:Y-m-d',
            'fecha_regreso' =>  'required|date|date_format:Y-m-d',
            'descripcion' => 'required|max:1000'

        ]);

        if ($request->hasFile('portada')) {
            $archivo = $request->file('portada');  // ponemos al archivo en una variable
            $nombre = '/img/portada/' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = 'img/portada/portada.jpg';
        }
        
        $viaje = new Viaje();
        $viaje->titulo = $request->input('titulo');  // recibimos el contenido del input
        $viaje->descripcion = $request->input('descripcion');  // recibimos el contenido del input
        $viaje->fecha_partida = $request->input('fecha_partida');  
        $viaje->fecha_regreso = $request->input('fecha_regreso');  
        $viaje->portada = $nombre;
        $viaje->save();
        return redirect()->route('viaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viaje = Viaje::find($id);  // usamos la función find
        $count = $viaje->users()->count();
        return view('viaje.show',compact(['viaje','count'])); // pasamos los viajes a la vista show con el contador
    }


    // // con binding, le pasamos el modelo en el parámetro
    // public function show(Viaje $viaje)
    // {
    //     // resuelve automáticamente el orm para show
    //     return view('viaje.show', compact('viaje'));    // pasamos los viajes a la vista  
    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     envía los cambios de los campos hecho mediante el formulario
     */
    public function edit($id)
    {
        $viaje = Viaje::find($id);  // usamos la función find
        return view('viaje.edit', compact('viaje'));    //pasamos los viajes a la vista edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

      recibe los campos modificados del formulario edit
     */
    public function update(Request $request, $id)
    {
        $viaje = Viaje::find($id);
        $viaje->fill($request->except('portada'));    // llenamos los datos del modelo con menos la foto
        if ($request->hasFile('portada')) {
            $archivo = $request->file('portada');  // ponemos al archivo en una variable
            $nombre = '/img/portada/' . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/portada',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = '/img/portada/portada.jpg';
        }

        $viaje->portada = $nombre;
        $viaje->save();
        return redirect()->route('viaje.show',[$viaje]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $viaje = Viaje::find($id);
         $viaje->delete();
         return redirect('admin')->with('info','viaje borrado');
    }

    public function UsuariosAnotados($id){
        $viaje = Viaje::findOrFail($id);
        $anotados = $viaje->users;
        return redirect()->route('viaje.show',compact('anotados'));
    }

    public function anotarUsuarioViaje($viajeId, $usuarioId){
        $viaje = Viaje::findOrFail($viajeId);
        $user = User::findOrFail($usuarioId);
        $viajeUsuario = $viaje->users()->attach($user);
        return view('home')->with('info','te sumaste al viaje');
    }

    public function borrarUsuarioViaje($viajeId, $userId){
        $viaje = Viaje::findOrFail($viajeId);
        $user = User::findOrFail($userId);
        $viajeUsuario = $viaje->users()->detach($user);
        return view('home')->with('info','te borraste del viaje');
    }

    // public function contarUsuarios($viajeId){
    //     $viaje = Viaje::findOrFail($viajeId);
    //     $count = $viaje->users()->count();
    //     return redirect()->route('viaje.show',compact(['viaje','$count']));
    // }

   /* 
    $users = User::where('votes', '>', 100)->take(10)->get();
    Code::where('to_be_used_by_user_id', '!=' , 2)->orWhereNull('to_be_used_by_user_id
        instalar node.js
vamos a la página dónde lo zipeamos
npm install
npm start

    */
}
