<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'description', 'color', 'title'
    ];

    /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
