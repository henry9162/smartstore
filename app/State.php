<?php

namespace SmartStore;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
	public function details()
	{

		return $this->hasManyThrough('SmartStore\Detail', 'SmartStore\User', 'state_id', 'user_id');
	}
}
