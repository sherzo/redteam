<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assistance extends Model
{
	 /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
    protected $fillable = [
        'user_id', 'entry', 'exit', 'entry_status', 'exit_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayEntryAttribute()
    {   
        $entry = new Carbon($this->entry);
        return $entry->format('H:m A');
    }

    public function getDisplayExitAttribute()
    {
        $entry = new Carbon($this->exit);
        return $entry->format('H:m  A');
    }

    public function getDateAttribute()
    {
        $day = new Carbon($this->entry);
        return $day->format('Y-m-d');
    }
}
