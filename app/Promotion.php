<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Promotion extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($img)
    {
        return Storage::disk('public')->url($img); 
    }
}
