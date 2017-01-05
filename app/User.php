<?php

namespace SmartStore;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'state_id', 'contact',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function details()
    {

        return $this->hasOne('SmartStore\Detail');
    }

    public function state()
    {

        return $this->belongsTo('SmartStore\State');
    }
}
