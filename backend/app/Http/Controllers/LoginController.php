<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){

        return view('login.index');
    }

    public function first(){

        return redirect('/login');
    }
 
    public function verify(Request $request){


      $request->validate([
         'email' => 'required | min:10 | max:50 | email',
         'password' => 'required | min:8 | max:20 | alpha_num',
         
     ]);

     $userInfo = User::where('email','=', $request->email)->first();

     if(!$userInfo){
         return back()->with('fail','We do not recognize your email address');
     }else{
         //check password
         if(Hash::check($request->password, $userInfo->password))
         {
            //if($userInfo->type == 'user'){
            //    $request->session()->put('Loggedtype', $userInfo->type);
            //     $request->session()->put('LoggedUser', $userInfo->id);
            //     return redirect('/customer/dashboard');
            // }
            // elseif($userInfo->type == 'admin'){
            //    $request->session()->put('Loggedtype', $userInfo->type);
            //     $request->session()->put('LoggedUser', $userInfo->id);
                 
            //     return redirect('/admin/dashboard');
            // }
            // elseif($userInfo->type == 'account'){
            //    $request->session()->put('Loggedtype', $userInfo->type);
            //     $request->session()->put('LoggedUser', $userInfo->id);
            //     return redirect('/');
            // }
            // elseif($userInfo->type == 'employee'){
            //    $request->session()->put('Loggedtype', $userInfo->type);
            //     $request->session()->put('LoggedUser', $userInfo->id);
            //     return redirect('/employee/dashboard');
            // }
            // elseif($userInfo->type == 'guide'){
            //    $request->session()->put('Loggedtype', $userInfo->type);
            //    $request->session()->put('LoggedUser', $userInfo->id);
            //    return redirect('/guide/dashboard');
            //}

            $request->session()->put('Loggedtype', $userInfo->type);
            $request->session()->put('LoggedUser', $userInfo->id);
            return redirect('/');

         }
         else{
             return back()->with('fail','Incorrect password');
         }
     }
   
   }
    }


