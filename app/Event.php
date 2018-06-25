<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'type', 'day'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
