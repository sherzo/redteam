<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Emergency extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'description', 'file', 'image', 'read'
    ];

    /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function discussions()
    {
        return $this->morphMany('App\Discussion', 'discussable');
    }

    /*
    *   Magic methods
    */
     public function getFileAttribute($document)
    {
        if(!$document) {
            return $document;
        }

        return Storage::disk('public')->url($document); 
    }
    
    public function getImageAttribute($avatar)
    {
        if(!$avatar) {
            return $avatar;
        }

        return Storage::disk('public')->url($avatar); 
    }
}

