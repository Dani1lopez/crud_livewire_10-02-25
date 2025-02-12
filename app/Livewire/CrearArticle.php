<?php

namespace App\Livewire;

use Livewire\Component;

class CrearArticle extends Component
{
    public bool $openCrear=false;
    public function render()
    {
        return view('livewire.crear-article');
    }
}
