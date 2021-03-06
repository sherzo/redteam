<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'entry', 'exit', 'midday'
    ];

    public function days()
    {
    	return $this->hasMany(ScheduleDay::class);
    }

}
