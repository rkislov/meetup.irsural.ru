<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'peoples';
    protected $fillable = [
        'name','position','images','text','user_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
