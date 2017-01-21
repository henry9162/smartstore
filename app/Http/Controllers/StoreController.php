<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Detail;

use SmartStore\Category;

use SmartStore\User;

use SmartStore\Role;

use SmartStore\Review;

use Image;

use Auth;

use Validator;

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


    public function getReview($storeId)
    {

        $store = Detail::find($storeId);

        $reviews = $store->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);

        return view('store.reviews')->withStore($store)->withReviews($reviews);
    }


    public function postReview(Request $request, $id)
    {
        //dd($id);
        $input = array(
            'comment' => $request->input('comment'),
            'rating'  => $request->input('rating')
        );
        // instantiate Rating model
        $review = new Review;

        // Validate that the user's input corresponds to the rules specified in the review model
        $validator = Validator::make( $input, $review->getCreateRules());

        // If input passes validation - store the review in DB, otherwise return to product page with error message 
        if ($validator->passes()) {
            $review->storeReviewForStore($id, $input['comment'], $input['rating']);
            return redirect()->back()->with('review_posted',true);
        }
        
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
