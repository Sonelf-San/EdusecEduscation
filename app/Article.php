<?php

namespace App;
use App\Logo;
use App\ArtFile;
use App\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    //
    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
    public function logo()
    {
        return $this->belongsTo(Logo::class);
    }

    public function art_files()
    {
        return $this->hasMany(ArtFile::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getLogoUrl(){
        // asset('storage/logos/' . $article->logo->image)
        // dd($this->logo->image);
        return asset( 'storage/logos/'.$this->logo->image);
        // return $this->logo->image && Storage::exists('/logos/', $this->logo->image)
        //     ? asset('storage/logos/'.$this->logo->image) : asset('assets/images/product-placeholder.png');
    }
}
