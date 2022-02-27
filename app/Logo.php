<?php

namespace App;

use App\Article;
use App\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Logo extends Model
{
    // 
    protected $fillable = [
        'name',
        'image'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function getLogoUrl(){
        return $this->image && Storage::exists('/logos/', $this->image)
            ? asset('storage/logos/'.$this->image) : asset('assets/images/product-placeholder.png');
    }
}