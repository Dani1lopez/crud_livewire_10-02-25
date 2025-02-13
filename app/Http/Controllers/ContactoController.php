<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function pintarFormulario(){
        return view('formcorreos.fcontacto');
    }

    public function procesarFormulario(){

    }
}
