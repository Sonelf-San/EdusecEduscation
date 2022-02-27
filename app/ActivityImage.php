<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ActivityImage extends Model
{

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function getImageUrl() {
        return $this->path && Storage::exists($this->path)
            ? asset('storage/'.$this->path) : asset('assets/images/product_placeholder.png');
    }

    /*==========================================
            Events
        ===========================================*/
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {

            if ($image->path) {
                Storage::delete($image->path);
            }
        });
    }
}
