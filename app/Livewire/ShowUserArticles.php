<?php

namespace App\Livewire;

use App\Livewire\Forms\FormUpdateArticle;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUserArticles extends Component
{
    use WithPagination;

    public FormUpdateArticle $uform;
    public bool $openUpdate=false;

    public bool $openDetalle=false;
    public ?Article $articleDetalle=null;

    public string $campo="id",$orden="desc";
    public string $buscar = "";

    #[On('onArticleCreado')]
    public function render()
    {
        $articles=DB::table('articles')
        ->join('tags','tag_id','=','tags.id')
        ->select('articles.*','name','color')//Si el nombre es repetido en otra tabla entonces debo de ponerle un alias
        ->where('user_id',Auth::user()->id)
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


    //Metodos para borrar articulo
    public function confirmarDelete(Article $article){
        $this->authorize('delete',$article);
        $this->dispatch('onBorrarArticle',$article->id);
    }

    #[On('borrar')]
    public function delete(Article $article){
        $this->authorize('delete',$article);
        $article->delete();
        $this->dispatch('mensaje','Articulo borrado con exito');
    }

    //Metodos para editar el articulo
    public function edit(Article $article){//Me abre la modal pra editar el articulo en cuestion
        $this->authorize('update',$article);
        $this->uform->setArticle($article);
        $this->openUpdate=true;
    }

    public function update(){
        $this->authorize('update',$this->uform->article);
        $this->uform->formUpdate();
        $this->cancelar();
        $this->dispatch('mensaje','Articulo editado con exito');
    }

    public function cancelar(){
        $this->openUpdate=false;
        $this->uform->formReset();
    }

    //Metodos para el articulo detalle
    public function detalle(Article $article){
        $this->articleDetalle=$article;
        $this->openDetalle=true;
    }

    public function cerrarDetalle(){
        $this->reset('articleDetalle','openDetalle');
    }
}
