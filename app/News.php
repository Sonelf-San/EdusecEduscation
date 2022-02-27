<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public function images() {
        return $this->hasMany(NewsImage::class, 'new_id');
    }

    public function getImageUrl() {
        return $this->image && Storage::exists($this->image)
            ? asset('storage/'.$this->image) : asset('assets/images/reference-placeholder.png');
    }

    public function category() {
        return $this->belongsTo(NewsCategory::class, 'category_id')->withTrashed();
    }

    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }



    /*==========================================
            Events
        ===========================================*/
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($reference) {

            if ($reference->image) {
                Storage::delete($reference->image);
            }

            $reference->images()->delete();
        });
    }
}
