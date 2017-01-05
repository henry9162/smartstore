<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

use SmartStore\Category;

use SmartStore\User;

use SmartStore\State;

use Auth;

use Image;

use Storage;


class ProfileController extends Controller
{

    public function index($userId)
    {
        
    	$store = Detail::where('user_id', $userId)->first();

    	$categories = Category::all();

        $categories2 = [];

    	foreach($categories as $category){
            $categories2[$category->id] = $category->name;
        }

        $names = [];

        foreach ($store->categories as $category) {
            
            $names[$category->name] = $category->id;
        }

        $states = State::all();

        $states2 = [];

        foreach($states as $state){

            $states2[$state->id] = $state->name;
        }

    	return view('profile.index')->withStore($store)->withCategories($categories2)->with('names', $names)
        ->withStates($states2);
    }


    public function update(Request $request)
    {

    	$this->validate($request, [
			'name' => 'required|max:50',
			'email' => 'required|email|max:50',
            'contact' => 'required|max:14',
            'state_id' => 'required|integer'
		]);

		Auth::user()->update([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'state_id' => $request->input('state_id')
		]);

		return redirect()->back()->with('info', 'Your proile has been updated');
    }

    public function updateStore(Request $request, $userId)
    {
    	$id = Auth::user()->details->id;

    	$this->validate($request, [
			'store' => "required|max:200|unique:details,store,$id",
            'store_image' => 'sometimes|image',
            'description' => 'required|max:255',
            'address' => "required|max:200|unique:details,address,$id",
            'area' => 'required|max:255',
            'park' => 'required|max:255'
		]);

		if($request->hasFile('store_image'))
        {
            $image = $request->file('store_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $oldImageFile = Auth::user()->details->image;

            $store = Detail::where('user_id', $userId)->first();

            $store->update([
                'store' => $request->input('store'),
                'image' => $filename,
                'description' => $request->input('description'),
                'address' => $request->input('address'),
                'area' => $request->input('area'),
                'park' => $request->input('park')
            ]) ? $store : false;

            if (isset($request->categories)){
                $store->categories()->sync($request->categories);
            } else {
                $store->categories()->sync(array());
            }

            Storage::delete($oldImageFile);

        }

		return redirect()->back()->with('info', 'Your store details has been updated');
    }

}
