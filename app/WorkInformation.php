<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area_id', 'branch_id', 'mark_id', 'phone', 'admission', 'extension', 'position', 'user_id'
    ];
}
