<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct()
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
        $users = User::all();  // traemos a todos los viajes
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);  // usamos la función id
        return view('usuarios.show', compact('user'));    // pasamos los viajes a la vista show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        
    public function edit($id)
    {   
        $user = User::find($id);
        return view('usuarios.edit', compact('user'));
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
        $user = User::find($id);
        $user->fill($request->except(['avatar','old_avatar']));
        if ($request->hasFile('avatar')) {
            $archivo = $request->file('avatar');  // ponemos al archivo en una variable
            $nombre = "/img/avatars/". time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
            $archivo->move(public_path().'/img/avatars',$nombre);    // lo movemos a la carpeta img de public del proyecto
        }else{
            $nombre = $user->old_avatar;
        }

        $user->avatar = $nombre;
        $user->save();

        return redirect()->route('home');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        // return redirect()->route('/');
        return view("quienes_somos");
    }

    public function sumarViaje($id_u,$id_v){
        $user = User::findOrFail($id_u);
        // llamamos al objeto user, a la relación roles, le adjuntamos un viaje indicado
        $user->viajes()->sync($id_v);
    }

    public function borrarViaje($id_u,$id_v){
        $user = User::findOrFail($id_u);
        // llamamos al objeto user, a la relación roles, le borramos el viaje indicado
        $user->viajes()->detach($id_v);
    }

    public function viajesAnotados($id){
        $user = User::findOrFail($id);
        return $user->viajes;
    }
    
}

