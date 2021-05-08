<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Imports\CustomersExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
    }
    public function confirmstatus($id, Request $req)
    {
     $customer = Customer::find($id);
      
       
        $customer->status= 1;
        $customer->status = $req->status;
        $customer->save();
     
        return redirect('/employee/dashboard/view')->with("success",'Confirm status succeessfully');
   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        return view('employee.dashboard.customer.adduser',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       $customer = new Customer();
        $customer->fullname = $req->input('fullname');
        $customer->username = $req->input('username');
        $customer->email = $req->input('email');
        $customer->address = $req->input('address');
        $customer->phone = $req->input('phone');
        $customer->password = Hash::make($req->input('password'));
        $customer->gender = $req->input('gender');
        $customer->save();

      /*   Toastr::success('ADDED', 'Success');
        Toastr::failed('failed', 'failed'); */
    /*   
     if($customer->save()){
            return redirect('/employee/dashboard')->with('success','Profile Information Update Succesfull');
           
        }
        else{
            return redirect('/employee/dashboard')->with('fail','Profile Information Update failed');
        }  */

        return $customer;
    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $customerlist = Customer::paginate(5);
        return view('employee.dashboard.customer.viewuser',$data)->with('customerlist',$customerlist);
    }


    public function search(Request $req)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $search = $req->get('search');
        $customerlist = DB::table('customers')->where('username' , 'like' , '%'.$search.'%')->paginate(5);
        return view('employee.dashboard.customer.viewuser',$data)->with('customerlist',$customerlist);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $customer = Customer::find($id);
        return view('employee.dashboard.customer.edituser',$data)->with('customer',$customer);
    }
    public function import(Request $req)
    {
        $file = $req->file('file')->store('import');
        Excel::import(new CustomersExport, $file);
        return back()->withStatus('Excel File import successfully')->with('success','Excel File import successfully');;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      
        $customer = Customer::find($id);
        $customer->fullname = $req->fullname;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone = $req->phone;
        $customer->password = $req->password;
        $customer->gender = $req->gender;
        
        if($customer->save()){
            return redirect('/employee/dashboard/view')->with('success','Customer Information Update Succesfull');
           
        }
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Customer::destroy($id)){
            return redirect('/employee/dashboard/view')->with('success','Customer Information Detele Succesfull');
           
        }
      
       
    }
}
