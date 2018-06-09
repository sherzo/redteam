<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'description'
    ];

    /*
    *   Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function format(Discussion $discussion)
    {
        $discussion->loadMissing('user');

        return [
            'name' => $user->name,
            'avatar' => $user->avatar
        ];
    }
    
    public function discussions()
    {
        return $this->morphMany('App\Discussion', 'discussable');
    }
}
