<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function candidate()
    {
    	return $this->hasMany('SmartStore\Candidate');
    }
}
