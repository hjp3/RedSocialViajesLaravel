<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contacto;

class PaginaController extends Controller
{
    
    public function faq()
    {
    	return view('faq');
    }

    public function contactos()
    {
        return view('contactos');
    }

    public function quienes_somos()
    {
    	return view('quienes_somos');
    }

    

    
}
