<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

use SmartStore\Category;

use SmartStore\User;

use SmartStore\Role;

use Image;

use Auth;

class StoreController extends Controller
{
    
    public function index($user_id)
    {

    	$store = Detail::where('user_id', $user_id)->first();

    	return view('store.index')->withStore($store);
    }


    public function getCreate()
    {
    	$categories = Category::all();
    	return view('store.create')->withCategories($categories);
    }


    public function create(Request $request)
    {

		$this->validate($request, [
        'store' => 'required|max:200|unique:details,store',
        'store_image' => 'sometimes|image',
        'description' => 'required|max:255',
        'address' => 'required|max:200|unique:details,address',
        'area' => 'required|max:255',
        'park' => 'required|max:255'
    ]);

		$detail = new Detail;

        $detail->store = $request->store;

        if($request->hasFile('store_image'))
        {
            $image = $request->file('store_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $detail->image = $filename;
        }

        $detail->description = $request->description;
        $detail->address = $request->address;
        $detail->area = $request->area;
        $detail->park = $request->park;
        $detail->user_id = Auth::user()->id;

        $detail->save();

        $detail->categories()->sync($request->categories, false);

        Auth::user()->roles()->attach(Role::where('name', 'storeOwners')->first());

    	return redirect()->route('store.index', Auth::user()->id)->with('info', 'Your store was created successfully!.');
    }
}
