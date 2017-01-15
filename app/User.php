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
        'name', 'email', 'password', 'state_id', 'contact', 'first_name', 'last_name', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getName()
    {
        if ($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }

        elseif ($this->first_name){
            return $this->first_name;
        } else

        {
             return null;
        } 
    }

    
    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }


    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }


    public function details()
    {

        return $this->hasOne('SmartStore\Detail');
    }

    public function state()
    {

        return $this->belongsTo('SmartStore\State');
    }


    public function roles()
    {
        return $this->belongsToMany('SmartStore\Role');
    }


    public function orders()
    {

        return $this->hasMany('SmartStore\Order');
    }


    public function hasAnyRole($roles)
    {

        if (is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }


    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()){
            return true;
        }
    }


}
