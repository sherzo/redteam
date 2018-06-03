<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'school', 'technical', 'university', 'postgraduate', 'diplomat', 'others', 'abilities'
    ];
}
