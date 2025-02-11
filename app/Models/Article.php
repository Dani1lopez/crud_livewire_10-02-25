<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable=['title','content','user_id','tag_id'];


    //Relacion N:1 con user
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    //Relacion N:1 con tag
    public function tag():BelongsTo{
        return $this->belongsTo(Tag::class);
    }
}
