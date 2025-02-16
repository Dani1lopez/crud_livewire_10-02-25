<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function pintarFormulario(){
        return view('formcorreos.fcontacto');
    }

    public function procesarFormulario(Request $request){
        $request->validate([
            'name'=>['required','string','min:5','max:50'],
            'email'=>(Auth::user()!=null) ? ['nullable','email'] : ['required','email'],
            'body'=>['required','string','min:10','max:180']
        ]);
        try {
            Mail::to('soporte@gmail.com')
            ->send(new ContactoMailable($request->name,$request->email ?? Auth::user()->email, $request->body));
            return redirect()->route('inicio')->with('mensaje','Se envio el mensaje con exito');
        } catch (\Exception $ex) {
            return redirect()->route('inicio')->with('mensaje','No se envio el mensaje con exito');
        }
    }
}
