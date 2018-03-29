<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    protected $fillable = [
        'name', 'filter','images','user_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
