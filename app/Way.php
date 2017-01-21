<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    public function candidates()
    {
    	return $this->hasMany('SmartStore\Candidate');
    }

     public function subjects()
    {
    	return $this->hasMany('SmartStore\Subject');
    }
}
