<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getIndex(){
        return view('feeds.index');
    }


    public function getsignUp()
    {
        return view('auth.register');
    }

    public function postsignUp(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        Auth::login($user);

        return redirect()->route('index');

    }


    public function getSignIn()
    {
        return view('auth.login');
    }


    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('index');
        }

        return redirect()->back();
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('index');
    }
}
