<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }


//google
public function redirectToGoogle(){

    return Socialite::driver('google')->redirect();
}

/* public function handleGoogleCallback() {
    $user = Socialite::driver('google')->stateless()->user();

    $this->_registerOrLoginUser($user);

    return redirect('/customer/dashboard');
} */



//facebook
public function redirectToFacebook(){

    return Socialite::driver('facebook')->redirect();
}
/* 
public function handleFacebookCallback() {
    $user = Socialite::driver('facebook')->stateless()->user();

    $this->_registerOrLoginUser($user);

    return redirect('/customer/dashboard');
} */


protected function _registerOrLoginUser($data){

    $user = User::where('email', '=', $data->email)->first();
    if(!$user){

        $user = new User();
        $user->username = $data->username;
        $user->email = $data->email;
        $user->provider_id = $data->id;
        $user->profile_img = $data->profile_img;
       // $user->role = user;
        $user->save();
    }
    
}












    public function first(){

        return redirect('/login');
    }
 
    public function verify(Request $request){


   /*    $request->validate([
         'email' => 'required | min:10 | max:50 | email',
         'password' => 'required | min:8 | max:20 | alpha_num',
         
     ]); */

     $userInfo = User::where('email','=', $request->email)->first();
  
     if(!$userInfo || Hash::check($request->password, $userInfo->password))
     {
         return["error"=>"Email or Password is not matched"];
     }
     return $userInfo;


    /*  if(!$userInfo){
         return back()->with('fail','We do not recognize your email address');
     }else{
         //check password
         if(Hash::check($request->password, $userInfo->password))
         {
           

            $request->session()->put('Loggedtype', $userInfo->type);
            $request->session()->put('LoggedUser', $userInfo->id);
            return redirect('/');

         }
         else{
             return back()->with('fail','Incorrect password');
         }
     } */
   
   }
    }


