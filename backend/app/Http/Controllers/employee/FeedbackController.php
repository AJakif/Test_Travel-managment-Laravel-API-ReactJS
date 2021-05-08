<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use App\Models\feedback;
use Illuminate\Http\Request;
use App\Models\feedbackcatagory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$data = ['LoggedUserInfo'=>User::where('id','=', session('LoggedUser'))->first()];
        $feedbacklist =  feedback::all();
        return view('employee.dashboard.feedback.viewfeedback',$data,compact('feedbacklist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['LoggedUserInfo'=>user::where('id','=', session('LoggedUser'))->first()];
        $feedbackcatagorys =  feedbackcatagory::all();
        return view('employee.dashboard.feedback.createfeedback',$data,compact('feedbackcatagorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $req)
    {
        $feedback = new feedback();
        $feedback->name = $req->name;
        $feedback->email = $req->email;
        $feedback->message = $req->message;
        $feedback->feed_cat_id = $req->service;
        $feedback->save();
        return redirect('/employee/dashboard')->with("success",'Create succeessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function delete($f_id)
    {
        if(feedback::destroy($f_id)){
            return redirect('/employee/dashboard/viewfeedback')->with("fail",'Delete succeessfully');
        } 
    }
}
