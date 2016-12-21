<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\User;

use SmartStore\Detail;

use Image;

class AuthController extends Controller
{

	public function getRegister()
    {

		return view('auth.register');  	
    }
    
    public function Register(Request $request)
    {

		$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'store' => 'required|max:200|unique:details,store',
            'store_image' => 'sometimes|image',
            'description' => 'required|max:255',
            'address' => 'required|max:200|unique:details,address',
            'city' => 'required|max:255',
            'area' => 'required|max:255',
            'park' => 'required|max:255'
        ]);

        $user = User::create([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);


        if($request->hasFile('store_image'))
        {
            $image = $request->file('store_image');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);

            $user->details()->create([

            'store' => $request->input('store'),
            'image' => $filename,
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'area' => $request->input('area'),
            'park' => $request->input('park'),
            'user_id' => $user->id,
        ]);

        }

        return redirect()->route('home')->with('info', 'Your shop is ready, you can now sign in.');

    }


    public function getSignIn()
    {

    	return view('auth.signIn');
    } 


    public function SignIn()
    {

    	dd('signin');
    } 

    
}
