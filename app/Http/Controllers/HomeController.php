<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

class HomeController extends Controller
{
    
    
    public function index()
    {
        $stores = Detail::all();

        return view('home')->withStores($stores);
    }
}
