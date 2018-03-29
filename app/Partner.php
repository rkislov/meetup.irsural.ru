<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
      'name','href','images','user_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
