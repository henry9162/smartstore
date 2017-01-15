<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

use SmartStore\Category;

use SmartStore\State;


class HomeController extends Controller
{
    
    
    public function index()
    {

        $stores = Detail::all();
        $states = State::all();

        return view('home')->withStores($stores)->withStates($states);
    }
}
