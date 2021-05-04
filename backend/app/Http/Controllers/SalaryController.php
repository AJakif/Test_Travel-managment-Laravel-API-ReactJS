<?php

namespace App\Http\Controllers;

use App\Models\Employeeattendance;
use App\Models\User;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $data['alldata'] = EmployeeSalary::all();
        return view('account.dashboard.salarylog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        return view('account.dashboard.salarylog.pay',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getsalary(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));

            if($date !=''){
                $where[] = ['date','like',$date.'%'];
            }
            $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
            $edata = Employeeattendance::select('employee_id')->groupBy('employee_id')->where($where)->get();
                   
            return view('account.dashboard.salarylog.pay',$data)->with('editdata',$edata)
            ->with('where',$where)
            ->with('date',$date);
    }

   
    public function update(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        EmployeeSalary::where('date',$date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata != 'null'){
            for($i='0'; $i < count($checkdata) ; $i++){
                //dd($checkdata);
                $data = new EmployeeSalary();
                $data->date = date('Y-m-d');
                //dd($request->employee_id[$checkdata[$i]]);
                
                $data->amount = $request->amount[$checkdata[$i]];
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->status = 'paid';
                $data->save();
            }
        }
        if(!empty($data) || empty($checkdata)){
            return redirect()->route('account.employee.salary.view')->with('success','Salary Successfully Paid');
        }else{
            return redirect()->back()->with('error','Sorry! Salary Not Paid, Please Try Again');
        }
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
