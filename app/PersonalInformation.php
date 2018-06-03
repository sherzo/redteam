<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marital', 'address', 'personal_email', 'department', 'town', 'birthdate', 'user_id'
    ];
}
