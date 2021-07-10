<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function order()
	{
		return $this->hasMany('App\Order');
	}

}
