<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\User;

use SmartStore\Detail;

use Image;

use SmartStore\Tag;

use SmartStore\Category;

use Auth;

class AuthController extends Controller
{

	public function getRegister()
    {
        $tags = Tag::all();

        $categories = Category::all();

		return view('auth.register')->withCategories($categories)->withTags($tags);  	
    }
    
    public function Register(Request $request)
    {

		/*$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'store' => 'required|max:200|unique:details,store',
            'store_image' => 'sometimes|image',
            'description' => 'required|max:255',
            'address' => 'required|max:200|unique:details,address',
            'area' => 'required|max:255',
            'park' => 'required|max:255'
        ]);*/


        $user = User::create([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);


        if ($request->hasFile('store_image'))
        {
            $image = $request->file('store_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);


            $detail = Detail::create([

            'store' => $request->input('store'),
            'image' => $filename,
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'area' => $request->input('area'),
            'park' => $request->input('park'),
            'user_id' => $user->id,
        ])->categories()->sync($request->categories, false);

        }
        
        return redirect()->route('home')->with('info', 'Your shop is ready, you can now sign in.');

    }


    public function SignIn(Request $request)
    {

    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
            return redirect()->back()->with('info', 'Could not sign you in with these details, please check and try again.');
        }

        // The only helper function can only pass in maximum of two variables
        return redirect()->route('store.index', Auth::user()->id)->with('info', 'You are now signed in!.');
    } 


    public function logout()
    {

        Auth::logout();

        return redirect()->route('home');
    }

    
}
