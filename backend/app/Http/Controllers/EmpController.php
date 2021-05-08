<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $data['alldata'] = User::where('type','=' ,'employee')->orwhere('type','=' ,'guide')->get();
        return view('account.dashboard.employee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        
        return view('account.dashboard.employee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $user = new user();
                $user->fullname = $request->fullname;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
              //   $user->address = $request->address;
             //    $user->company = $request->company;
                $user->phone = $request->phone;
                $user->gender = $request->gender;
                // $user->city = $request->city;
                $user->salary = $request->salary;
                $user->type = $request->type;
                $user->join_date = date('Y-m-d',strtotime($request->join_date)) ;
                if($request -> file('image')){
                    $file = $request -> file('image');
                    $data = $user->username;
                    $filename = $data.$file->getClientOriginalExtension();
                    $file->move(public_path('upload/user_image'), $filename);
                    $user['profil_img']= $filename;
                }
                $user->save();

                $employee_salary = new EmployeeSalaryLog();
                $employee_salary->employee_id = $user->id;
                $employee_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
                $employee_salary->previous_salary = $request->salary;
                $employee_salary->present_salary = $request->salary;
                $employee_salary->increment_salary = '0';
                $employee_salary->save();

            return redirect()->route('account.employee')->with('success','Employee regestered Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
       $data['user'] = User::find($id);
       return view('account.dashboard.employee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
      //   $user->address = $request->address;
     //    $user->company = $request->company;
        $user->phone = $request->phone;
        // $user->city = $request->city;
        //$user->type = $request->role;
        if($request -> file('image')){
            $file = $request -> file('image');
            @unlink(public_path('upload/user_image'.$user->profile_img));
            $data = $user->username;
            $filename = $data.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_image'), $filename);
            $user['profil_img']= $filename;
        }
        $user->save();


        return redirect()->route('account.employee')->with('success','Employee Information Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
