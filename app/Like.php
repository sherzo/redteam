<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'publication_id'
    ];

    /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
