<?php

namespace App;
use App\Logo;

use Illuminate\Database\Eloquent\Model;

class school extends Model
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
}
