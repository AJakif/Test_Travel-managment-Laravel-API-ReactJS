<?php

namespace App\Http\Controllers\employee;
use App\Models\User;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Tourguide;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\BookingsExport;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    { $data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
           $packagelist = Package::where('status','=','active')->paginate(5);
        return view('employee.dashboard.booking.indexbooking',$data)->with('packagelist',$packagelist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($p_id)
    {   $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
         $customers =  DB::table('customers')->get(); 
        $package = Package::find($p_id);
        
        
        return view('employee.dashboard.booking.createbooking',$data)->with('package',$package)->with('customers',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $booking = new booking();
        $booking->pro_id = $req->pro_id;
        $booking->travel_date_start = $req->travel_date_start;
        $booking->travel_date_end = $req->travel_date_end;
        $booking->person = $req->person;
        $booking->username = $req->username;
        $booking->email = $req->email;
        $booking->bstatus = 0;
        $booking->tour_username = null;
        ;
       
        if($booking->save()){
            return redirect('/employee/dashboard')->with('success','Booking Confirm Succesfull');
           
        }
        else{
            return redirect('/employee/dashboard')->with('fail','Booking failed');
        } 
   ;
    }
 
   public function storebooking($b_id, Request $req)
   {
    $booking = booking::find($b_id);
     
      
       $booking->bstatus= 1;
       $booking->bstatus = $req->status;
       $booking->save();
      
       return redirect('/employee/dashboard/viewbooking');
  
   }
   



   public function tourguide($b_id, Request $req)
   {
  
$bookingid = $b_id;

$tour_id = $req->t_id;

$tour = TourGuide::findOrfail($tour_id);

      $tour->booking_id = $bookingid ;
      $tour->save();
      


      
   
    $booking = booking::find($b_id);
     
   
     $booking->tour_username= $req->t_id;
     $booking->save();

       

     
      
    
       return redirect('/employee/dashboard/viewbooking')->with("success",'TourGuide add succeessfully');
  
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */



      public function show(Booking $booking)
    {  
        $udata = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $tourguides = Tourguide::all();
        $bookinglist =  DB::table('bookings')
        ->join('packages','packages.p_id','=','bookings.pro_id')
        ->get();
        $packages= Package::get();

       $data =['packages' => $packages,
    'bookinglist' =>  $bookinglist,

    ];
        return view('employee.dashboard.booking.viewbooking',$udata)->with('data',$data)->with('tourguides',$tourguides);
    }

public function search(Request $req)
{ $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
    $search = $req->get('search');
    $tourguides = Tourguide::all();

    $bookinglist =  DB::table('bookings')->where('username' , 'like' , '%'.$search.'%')
    ->join('packages','packages.p_id','=','bookings.pro_id')
    ->get();
    $packages= Package::get();

   $data =['packages' => $packages,
'bookinglist' =>  $bookinglist,
];
return view('employee.dashboard.booking.viewbooking',$data)->with('data',$data)->with('tourguides',$tourguides);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }
    public function export(Excel $execl)
    {   
        return $execl->download(new BookingsExport,'bookings.xlsx');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($b_id)
    {
        Booking::destroy($b_id);
        
        return redirect('/employee/dashboard/viewbooking')->with("success",'Booking Delete succeessfully');
    }
}
