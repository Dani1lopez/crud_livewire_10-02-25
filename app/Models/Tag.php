<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $fillable=['name','description'];

    //Relacion 1:N con articles
    public function articles():HasMany{
        return $this->hasMany(Article::class);
    }
}
