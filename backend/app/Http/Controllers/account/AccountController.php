<?php

namespace App\Http\Controllers\account;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\EmployeeSalary;
use App\Models\ExtraCost;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    function accountdashboard(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $count = DB::select('select count(*) as total from users');


        $start_date = date('Y-m');
        $end_date = date('Y-m',strtotime('+1 month'));

        $package_sell=Order::whereBetween('date',[$start_date, $end_date])->sum('amount');
        //dd($package_sell);
        $extra_cost=ExtraCost::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $emp_salary =EmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
        $total_cost = $extra_cost + $emp_salary;
        $profit = $package_sell-$total_cost;
        //$m_prof_rate= 
   
        return view('account.dashboard.index', $data,$count);
    }

    public function ulist(){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $userlist = DB::select('select * from users');
        return view('account.dashboard.user.Totaluser', $data)->with('userlist',$userlist);
    }


    public function edit( $id ,Request $req)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', $id)->first()];

       return view('account.dashboard.profile.editprofile',$data);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $req)
    {
        

        $user = User::find($id);   
            $user->fullname     = $req->fullname;
            $user->username     = $req->username;
            $user->email        = $req->email;
            $user->phone        = $req->phone;
            $user->address      = $req->address;
            /**$user->facebook     = $req->facebook;*/
            if ($req->hasFile('myfile')) {
                $file = $req->file('myfile');
                $fileName =  $req->session()->get('LoggedUser') . '.' .  $file->getClientOriginalExtension();
                if ($file->move(public_path('/upload/user_image'), $fileName)) {
                    $user->profile_img  = $fileName;
                    $user->save();
                   
                } else {
                 
                    return redirect(route('account.profile'))->with('fail','Profile Information Update Succesfull');
                }

               
            }    
            $user->save();
    return redirect(route('account.profile'))->with('success','Profile Information Update Succesfull');
    
   
      
            

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function profile(Request $req){
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        
        return view('account.dashboard.profile.profile',$data);
    }
}
