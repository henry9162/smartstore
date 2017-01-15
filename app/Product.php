<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [

		'title', 'slug', 'description', 'image', 'price', 'stock', 'detail_id',
	];


    public function detail()
    {

    	return $this->belongsTo('SmartStore\Detail');
    }


	public function hasLowStock()
	{
		if ($this->outOfStock()){
			return false;
		}

		return (bool) ($this->stock <= 5);
	}


	public function outOfStock()
	{
		return $this->stock === 0;
	}


	public function inStock()
	{
		return $this->stock >= 1;
	}


	public function orders()
    {

    	return $this->belongsToMany('SmartStore\Order');
    }

}
