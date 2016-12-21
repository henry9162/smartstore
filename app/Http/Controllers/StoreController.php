<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

use SmartStore\User;

class StoreController extends Controller
{
    
    public function index($user_id)
    {

    	$store = Detail::where('user_id', $user_id)->first();

    	return view('store.index')->withStore($store);
    }


    public function admin()
    {

    	return view('store.admin');
    }


    public function update()
    {

    	
    }
}
