<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'type', 'password', 'second_name', 'username', 'lastname', 'gender', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function personal()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function work() 
    {
        return $this->hasOne(WorkInformation::class);
    }

    public function academic()
    {
        return $this->hasOne(AcademicInformation::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname; 
    }

    public function getAvatarAttribute($avatar)
    {
        if(!$avatar) {
            return asset('assets/images/sin_avatar.png');
        }

        return Storage::disk('public')->url($avatar); 
    }
}
