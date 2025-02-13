<?php

namespace App\Livewire;

use App\Livewire\Forms\FormCrearArticle;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;

class CrearArticle extends Component
{
    public bool $openCrear=false;
    public FormCrearArticle $cform;
    
    public function render()
    {
        $tags=Tag::select('name','id')->orderBy('name')->get();
        return view('livewire.crear-article',compact('tags'));
    }

    public function store(){
        $this->cform->formStore();
        $this->cancelar();
        $this->dispatch('onArticleCreado')->to(ShowUserArticles::class);
        $this->dispatch('mensaje','Articulo creado con exito');
    }

    public function cancelar(){
        $this->openCrear=false;
        $this->cform->formReset();
    }
}
