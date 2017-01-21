<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function center()
    {
    	return $this->belongsTo('SmartStore\Center');
    }

    public function way()
    {
    	return $this->belongsTo('SmartStore\Way');
    }

    public function subject()
    {
    	return $this->belongsTo('SmartStore\Subject');
    }
}
