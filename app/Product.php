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

	public function reviews()
	{
		return $this->morphMany('SmartStore\Review', 'reviewable');
	}


	public function orders()
    {

    	return $this->belongsToMany('SmartStore\Order');
    }


    /*public function reviews()
    {
    	return $this->hasMany('SmartStore\Review');
    }
*/
    public function recalculateRating($rating)
    {
    	$reviews = $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->rating_cache = round($avgRating,1);
		$this->rating_count = $reviews->count();
    	$this->save();
    }

}
