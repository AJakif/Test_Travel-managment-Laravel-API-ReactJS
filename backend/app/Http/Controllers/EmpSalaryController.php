<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSalaryLog;
use Illuminate\Http\Request;
use App\Models\User;
use phpDocumentor\Reflection\Types\Float_;

class EmpSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $data['alldata'] = User::where('type','!=' ,'user')->get();
        return view('account.dashboard.employeesalary.index',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $data['details'] = User::find($id);
        $data['SalaryLog']=EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        dd($data['SalaryLog']->toArray());
        return view('account.dashboard.employeesalary.details',$data);
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
        return view('account.dashboard.employeesalary.edit',$data);
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
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->incremect_salary;
        $user->salary = $present_salary;
        $user->save();
        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_date = $request->effected_date;
        $salaryData->save();

        return redirect()->route('account.employee.salary')->with('succes','Salary Incremented Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
