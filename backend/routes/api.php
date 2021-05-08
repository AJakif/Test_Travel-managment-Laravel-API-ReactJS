<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\employee\BookingController;
use App\Http\Controllers\employee\EmpBlogController;
use App\Http\Controllers\employee\PackageController;
use App\Http\Controllers\employee\PackageCatagoryController;
use App\Http\Controllers\employee\CustomerController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\FeedbackController;
use App\Http\Controllers\employee\TourguideController;
use App\Http\Controllers\employee\FeedbackcatagoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::post('/login',[LoginController::class, 'verify']);

    //Employee ->customer
    
    Route::post("/register",[CustomerController::class,'store']);
  

    //Employee ->profile
   


    //Employee ->package
    Route::post("/addpackage",[PackageController::class,'store']);
    Route::get("/list",[PackageController::class,'list']);
    Route::delete("/deletepackage/{p_id}",[PackageController::class,'destroy']);

   //Employee ->packageCatalog
 




    //Employee ->booking
    

    //Employee -> tourguide
  


    //Employee -> feedback
   


    //Employee -> feedbackcatagory
    
   
   
   
    //employee -> BLOG

    



