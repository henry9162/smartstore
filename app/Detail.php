<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;


class Detail extends Model
{

	protected $fillable = [

		'store', 'image', 'address', 'description', 'user_id', 'city', 'area', 'park',
	];
    
    public function user()
    {

    	return $this->belongsTo('SmartStore\User');
    }


    public function categories()
    {

        return $this->belongsToMany('SmartStore\Category');
    }


    public function products()
    {

        return $this->hasMany('SmartStore\Product');
    }

    public function customers()
    {

        return $this->belongsToMany('SmartStore\Customer');
    }

}
