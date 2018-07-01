<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'data', 'type', 'url', 'read_at'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
