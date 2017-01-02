<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

use SmartStore\Detail;

class Category extends Model
{
	protected $table = 'categories';

    protected $fillable = [

    	'name',
    ];


    public function details()
    {

        return $this->belongsToMany('SmartStore\Detail');
    }
    
}
