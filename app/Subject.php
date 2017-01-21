<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function candidate()
    {
    	return $this->hasMany('SmartStore\Candidate');
    }

    public function way()
    {
    	return $this->belongsTo('SmartStore\Way');
    }
}
