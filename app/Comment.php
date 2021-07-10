<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function food()
    {
    	return $this->belongsTo('App\Food');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
