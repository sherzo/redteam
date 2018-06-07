<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'image', 'file', 'featured', 'emergency', 'description'
    ];

    /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function allLike()
    {
        return $this->likes->count();
    }

    /*
    *   Magic methods
    */
    public function getImageAttribute($image)
    {
        if(!$image) {
            return $image;
        }

        return Storage::disk('public')->url($image); 
    }

    public function getAllLikesAttribute()
    {
        return $this->likes->count();
    }
}
