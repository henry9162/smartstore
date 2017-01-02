<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

use SmartStore\User;

use SmartStore\Category;

use SmartStore\Tag;


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

}
