<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    // 
    protected $fillable = [
        'name',
        'link',
        'image'
    ];
}
