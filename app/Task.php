<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'user_id', 'status'
    ];

     /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
