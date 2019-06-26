<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
	protected $fillable = [
        'product_id', 'price', 'email'
    ];

    public function product()
	{
	    return $this->belongsTo('App\Product');
	}
}
