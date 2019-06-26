<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'sku', 'price', 'description', 'views'
    ];

    public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function bidings()
	{
	    return $this->hasMany('App\Bidding');
	}
}
