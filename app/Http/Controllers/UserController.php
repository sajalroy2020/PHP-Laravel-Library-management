<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Signup(){
       return view('auth.signup');
    }

    public function SignupStore(SignupRequest $request){
        $validateData = $request->validated();

        if (User::create($validateData)) {
            if (Auth::check()) {
                return redirect()->route('user')->with('SUCCESS_MESSAGE', 'user added successfully');
            }
            return redirect()->route('signin')->with('SUCCESS_MESSAGE', 'you have been registerd successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');

    }


    public function Signin(){
        return view('auth.signin');
     }

     public function SigninStore(SigninRequest $request){
        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            return redirect()->back()->withInput()->withErrors(['email'=> 'The email dosn\'t exists our record']);
        }

        if(!Hash::check($request->get('password'), $user->password)){
            return redirect()->back()->withInput()->withErrors(['email'=> 'The email or password is incurect']);
        }

        $activeID = User::where('email', $user['email'])->value('id');
        User::where('id', $activeID)->update(['is_active'=>true]);

        Auth::login($user);
        return redirect()->route('home')->with('SUCCESS_MESSAGE', 'you have been registerd successfully');
    }

    public function Logout(){
        $activeID = Auth::user()->id;
        if(Auth::check()){
            User::where('id', $activeID)->update(['is_active'=>false]);
            Auth::logout();
        }
        return redirect()->route('home')->with('SUCCESS_MESSAGE', 'you have been successfully log out');
     }


     public function user(){
        $data['users']= User::get();
        return view('dashboard.user', $data);
     }

}
