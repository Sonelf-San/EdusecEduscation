<?php

namespace App;

use App\GalImage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    // 
    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    public function gal_images()
    {
        return $this->hasMany(GalImage::class);
    }
}
