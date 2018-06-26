<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'content', 'user_id', 'chat_id'
    ];

    public function getContentAttribute($content)
    {
        if($this->type == 0) {
            return $content;
        }

       	return Storage::disk('public')->url($content); 
    }
     

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
