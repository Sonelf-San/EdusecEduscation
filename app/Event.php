<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    // 
    protected $fillable = [
        'name',
        'description',
        'image',
        'ville',
        'pays',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];

    public function displayDate()
    {
        $sd = date('d', strtotime($this->start_date));
        $sm = date('F', strtotime($this->start_date));
        $sy = date('Y', strtotime($this->start_date));

        $ed = date('d', strtotime($this->end_date));
        $em = date('F', strtotime($this->end_date));
        $ey = date('Y', strtotime($this->end_date));
        if ($sd === $ed && $sm === $em && $sy === $ey)
        {                                   
            return $sd.' '.$sm.' '.$sy;
        }
        elseif($sd != $ed && $sm === $em && $sy === $ey)
        {
            return $sd.' - '.$ed.' '.$sm.' '.$sy;                                    
        }
        elseif($sd != $ed && $sm != $em && $sy === $ey)
        {
            return $sd.' '.$sm.' - '.$ed.' '.$em.' '.$sy;                                    
        }
        else
        {
            return $sd.' '.$sm. ' '.$sy.' - '.$ed.' '.$em.' '.$ey;                                    
        }
    }
    // public function images() {
    //     return $this->hasMany(ReferenceImage::class, 'reference_id');
    // }

    // public function getImageUrl() {
    //     return $this->image && Storage::exists($this->image)
    //         ? asset('storage/'.$this->image) : asset('assets/images/reference-placeholder.png');
    // }

    // public function category() {
    //     return $this->belongsTo(ReferenceCategory::class, 'category_id')->withTrashed();
    // }



    /*==========================================
            Events
        ===========================================*/
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($this) {

    //         if ($this->image) {
    //             Storage::delete($this->image);
    //         }

    //         $this->images()->delete();
    //     });
    // }
}
