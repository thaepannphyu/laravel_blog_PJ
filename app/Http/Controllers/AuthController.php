<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{

    public function create(){
        return view("auth.create",);
    }

    public function store(){
      
    $formData=request()->validate([
      'name'=>'required|min:4|max:255',
      'username'=>['required','min:4','max:255',Rule::unique('users','username')],
      'email'=>['required','email',Rule::unique('users','email')],
      'password'=>['required','min:8']
    ]);

   

    $user=User::create( $formData);
    auth()->login($user,true);

    // session()->flash("success","Welcome reader".$user->name);

    return redirect('/')->with("success","Welcome reader ".$user->name);
    }

    public function login(){
      return view("auth.login");
    }

    public function post_login() {

      $formData=request() ->validate(
        [
         'email'=>['required','email','max:255',Rule::exists('users','email') ] ,
         'password'=>['required','min:8']
        ],
        [
        'email.required'=>'We neeed your email address',
        'password.min'=>'password must be more than 8 characters'
        ]
      );

     
      if(auth()->attempt($formData)){
       return redirect("/")->with("success","Welcome back ");
      }else{
        return redirect()->back()->withErrors([
          'email'=>"your password is wrong"
        ]);
      }
      
    }
    public function logout() {
      auth()->logout();
      return redirect('/')->with("success","Good Bye ");
    }

   
}
