<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'discussable', 'discussable_id', 'description'
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

    /**
     * Get all of the owning commentable models.
     */
    public function discussable()
    {
        return $this->morphTo();
    }
}
