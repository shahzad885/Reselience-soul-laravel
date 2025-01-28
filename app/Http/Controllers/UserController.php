<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register( Request $request ){
        $data = $request ->validate(
            [
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:3',

            ]
            );


            $user = User::create($data);
            //Login User
            Auth::login($user);
            //Sending Verification Email
            $user->sendEmailVerificationNotification();

            if($user){
                return redirect()->route('verification.notice');
            }
    }

    //login

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('AdminDashboard')->with('success', 'You have successfully logged in!');
        }
        return back()->withErrors([
            'AdminDashboard' => 'Invalid credentials. Please try again.',
        ])->withInput();
    }

    public function indexPage(){

            return view('index');
        }


    public function moodPage(){

            return view('mood');
        }

        public function AdminDashboardPage(){

            return view('Admin/AdminDashboard');
        }


        public function articlepage(){
            return view('article');
        }


    public function logout(){
      Auth::logout();
      return view('login');
    }


}
