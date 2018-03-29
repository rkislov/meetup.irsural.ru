<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
      'name','icon','text','user_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
