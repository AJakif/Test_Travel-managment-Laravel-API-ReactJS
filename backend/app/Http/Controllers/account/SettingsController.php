<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings(){
        $user = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $data=Settings::first();
        return view('account.dashboard.settings',$user)->with('data',$data);
    }

    public function settingsUpdate(Request $request){
        // return $request->all();
        $this->validate($request,[
            'short_des'=>'required|string',
            'description'=>'required|string',
            'photo'=>'required',
            'logo'=>'required',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
        ]);
        $data=$request->all();
        // return $data;
        $settings=Settings::first();
        // return $settings;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName =  $settings->id . '.' .  $file->getClientOriginalExtension();
            //$request->photo->move(public_path('/upload/blog_image'), $fileName);
           if ($file->move(public_path('/upload/webphoto'), $fileName)) {
                $data['photo']= $fileName;
                $status=$settings->fill($data)->save();
               
            } 
           
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName =  $settings->id . '.' .  $file->getClientOriginalExtension();
            //$request->photo->move(public_path('/upload/blog_image'), $fileName);
           if ($file->move(public_path('/upload/weblogo'), $fileName)) {
                $data['logo']= $fileName;
                $status=$settings->fill($data)->save();
               
            } 
           
        }
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->route('account.dashboard');
    }
}
