<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $fillable = [
      'name','alias','text','images','user_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
