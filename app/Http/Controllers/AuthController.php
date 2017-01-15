<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\User;

use SmartStore\State;

use SmartStore\Role;

use Auth;

use Session;

class AuthController extends Controller
{
    
    public function Register(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'username' => 'required|max:15|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|unique:users,contact',
            'state_id' => 'required|integer',
            'password' => 'required|min:6'
        ]);


        $user = User::create([

            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'state_id' => $request->input('state_id'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->roles()->attach(Role::where('name', 'generalUsers')->first());

        Auth::login($user);
        
        if(Session::has('oldUrl')){

            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');

            return redirect()->to($oldUrl);
        }
        
        return redirect()->route('home')->with('info', 'Thank you for Signing up with smartstore, create your store and start selling!');

    }


    public function getSignIn(Request $request)
    { 
        $states = State::all();
        return view('auth.signin')->withStates($states);
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

        if(Session::has('oldUrl')){

            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');

            return redirect()->to($oldUrl);
        }

        if (!Auth::user()->details){

             return redirect()->route('home')->with('info', 'You are now signed in!.');
        } 

        return redirect()->route('store.index', Auth::user()->id)->with('info', 'You are now signed in!.');

    } 


    public function logout()
    {

        Auth::logout();

        return redirect()->route('home');
    }

    
}
