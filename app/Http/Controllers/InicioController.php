<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(){
        $articulos=Article::with('user','tag')->orderBy('id','desc')->paginate(6);
        return view('welcome',compact('articulos'));
    }
}
