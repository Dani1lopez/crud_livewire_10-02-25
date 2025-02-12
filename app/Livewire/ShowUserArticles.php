<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserArticles extends Component
{
    use WithPagination;
    public string $campo="id",$orden="desc";
    public string $buscar = "";
    public function render()
    {
        $articles=DB::table('articles')
        ->join('tags','tag_id','=','tags.id')
        ->select('articles.*','name','color')//Si el nombre es repetido en otra tabla entonces debo de ponerle un alias
        ->where('user_id',Auth::id())
        ->where(function($q){
            $q->where('title','like',"%{$this->buscar}%")
            ->orWhere('content','like',"%{$this->buscar}%")
            ->orWhere('name','like',"%{$this->buscar}%");
        })
        ->orderBy($this->campo,$this->orden)
        ->paginate(3);

        $tags=Tag::select('name','id')
        ->orderBy('name')->get();
        return view('livewire.show-user-articles',compact('articles','tags'));
    }


    public function ordenar(string $campo){
        $this->orden=($this->orden=='desc') ? 'asc' : 'desc';
        $this->campo=$campo;
    }

    public function updatingBuscar(){
        $this->resetPage();
    }
}
