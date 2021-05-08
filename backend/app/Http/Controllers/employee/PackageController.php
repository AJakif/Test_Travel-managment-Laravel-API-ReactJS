<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\packagecatagory;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $packagecatagorys =  packagecatagory::all();
        return view('employee.dashboard.package.createpackage',$data,compact('packagecatagorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $package = new package();
        $package->package_name = $req->input('package_name');
        $package->package_type = $req->input('package_type');
        $package->package_location = $req->input('package_location');
        $package->package_price = $req->input('package_price');
        $package->package_feature = $req->input('package_feature');
        $package->package_details = $req->input('package_details');
        $package->package_time_duration = $req->input('package_time_duration');
        $package->package_image = $req->file('package_image')->store('text');
        $package->status = $req->input('status');
   
                $package->save();
                return $package;
            
        }

       public function list()
       {
           return Package::all();
       }
     

     /*    return redirect('/employee/dashboard')->with("success",'Create succeessfully'); */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    { $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $packagelist = Package::all();
       
        return view('employee.dashboard.package.viewpackage',$data)->with('packagelist',$packagelist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($p_id)
    { $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $package = Package::find($p_id);
   
        return view('employee.dashboard.package.editpackage',$data,)->with('package',$package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $p_id)
    {
        $package = Package::find($p_id);
        $package->package_name = $req->package_name;
      
        $package->package_location = $req->package_location;
        $package->package_price = $req->package_price;
        $package->package_feature = $req->package_feature;
        $package->package_details = $req->package_details;
        $package->package_time_duration = $req->package_time_duration;
        $package->package_image = $req->package_image;
        $package->status = $req->status;
        if ($req->hasFile('package_image')) {
            $file = $req->file('package_image');
            $fileName =  $req->package_name . '.' .  $file->getClientOriginalExtension();
            if ($file->move('upload', $fileName)) {
                $package->package_image  = $fileName;
                $package->save();
            } 
        }
        $package->save();

        return redirect('/employee/dashboard/viewpackage')->with("success",'update succeessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */

    public function packageshow($p_id)
    { $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $package = Package::find($p_id);
        return view('employee.dashboard.package.details',$data)->with('package',$package);
    }
    public function downloadPDF()
    {$data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $packagelist = Package::all();
        $pdf = PDF::loadView('employee.dashboard.package.viewpackage',compact('packagelist'),$data)->setOptions(['defaultFont' => 'sans-serif']);
       
       
      return $pdf->download('package.pdf');
    }
    public function destroy($p_id)
    {
$data=Package::where('p_id',$p_id)->delete();
if($data){

    return ["data"=>"package has beed deleted"];
}
   else{
    return ["data"=>"package has beed not deleted"];
   }    
       /*  if(Package::destroy($p_id)){
            return redirect('/employee/dashboard/viewpackage')->with("fail",'Delete succeessfully');
        }  */
    }

}
