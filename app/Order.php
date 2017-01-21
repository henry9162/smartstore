<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
	 protected $fillable = [
        'name', 'user_id', 'detail_id', 'contact', 'cart', 'hash', 'delivery', 'park',
    ];

    public function user()
    {

    	return $this->belongsTo('SmartStore\User');
    }


    public function products()
    {

    	return $this->belongsToMany('SmartStore\Product');
    }

    public function detail()
    {

        return $this->belongsTo('SmartStore\Detail');
    }
}
