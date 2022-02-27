<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Certificate extends Model
{

    protected $fillable = [
        'name', 'description', 'image', 'rank'
    ];

    public function getImageUrl() {
        return $this->image && Storage::exists($this->image)
            ? asset('storage/'.$this->image) : asset('assets/images/certificate-placeholder.png');
    }
}
