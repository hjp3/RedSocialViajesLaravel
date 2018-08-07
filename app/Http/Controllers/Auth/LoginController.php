<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }

    // hacemos el redirect inicial después de loguearse, este método tiene prioridad sobre la propiedad $redirecTo
    public function redirectPath(){
        Cookie::queue('email_user',Auth::user()->email,6000);
        if(Auth::user()->email == "admin@admin.com"){
            return "/admin";
        }
        
        return "/home";
    }
}
