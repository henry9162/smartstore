<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    public function candidate()
    {
    	return $this->hasMany('SmartStore\Candidate');
    }
}
