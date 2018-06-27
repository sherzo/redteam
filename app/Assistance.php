<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
