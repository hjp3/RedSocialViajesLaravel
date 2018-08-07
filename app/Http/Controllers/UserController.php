<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Viaje;
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
        //$user = USER::all();
        //$users = $users->whereNotIn('email',['admin@admin.com']);
        $users = USER::paginate(16);
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
        $posteos = Post::orderBy('id','DESC')->where('user_id',$user->id)->get();
        //$viajes = Viaje::orderBy('id','DESC')->where('user_id',$user->id)->get();
        
        //$viajes = User::find($id)->viajes()->where('user_id',$user->id)->get(); //->orderBy('id','DESC')->get();
        //dd($viajes);
        return view('usuarios.show', compact(['user','posteos']));   
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
            //"/img/avatars/"
            $nombre = "/img/avatars/" . time() . $archivo->getClientOriginalName(); // para que no se repita el nombre
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
        $users = USER::paginate(16);
        // return redirect()->route('/');
        return redirect('admin')->with('info','usuario borrado');
    }


    public function sumarViaje($id_u,$id_v){
        $user = User::findOrFail($id_u);
        // llamamos al objeto user, a la relación roles, le adjuntamos un viaje indicado
        $user->viajes()->attach($id_v);
    }
    

    public function borrarViaje($id_u,$id_v){
        $user = User::findOrFail($id_u);
        // llamamos al objeto user, a la relación roles, le borramos el viaje indicado
        $user->viajes()->detach($id_v);
    }



}
