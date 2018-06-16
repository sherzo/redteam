<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;
    use SoftDeletes;

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

    /*
    *   Relationships
    */
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

    public function boss()
    {
        return $this->belongsTo('App\User', 'boss_id');
    }

    public function employees()
    {
        return $this->hasMany('App\User', 'boss_id');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    public function schedulesComplete()
    {
        return $this->schedules()->where('midday', false);
    }

    public function schedulesMidday()
    {
        return $this->schedules()->where('midday', true);
    }

    /*
    *   Magis methods
    */
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

    public function getShowGenderAttribute()
    {
        return $this->gender ? 'Hombre' : 'Mujer';
    }

    public function getShowMaritalAttribute()
    {
        $status = ['Soltero(a)', 'Casado(a)', 'Divorciado(a)', 'Viudo(a)'];

        return $status[$this->personal->marital];
    }

    public function getBossNameAttribute()
    {
        if($this->boss) {
            return $this->boss->full_name;
        }

        return '';
    }
}
