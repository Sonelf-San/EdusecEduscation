<?php

namespace App;

use App\Article;

use Illuminate\Database\Eloquent\Model;

class ArtFile extends Model
{
    //
    protected $fillable = [
        'article_id',
        'file'
    ];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
