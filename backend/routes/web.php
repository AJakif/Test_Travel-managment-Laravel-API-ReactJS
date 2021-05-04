<?php
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\employee\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\employee\PackageController;
use App\Http\Controllers\employee\BookingController;
use App\Http\Controllers\employee\TourguideController;
use App\Http\Controllers\employee\FeedbackController;
use App\Http\Controllers\account\AccountController;
use App\Http\Controllers\account\Blog\BlogCategoryController;
use App\Http\Controllers\account\Blog\BlogCommentController;
use App\Http\Controllers\account\Blog\BlogTagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\customer\UCustomerController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\tourguide\guideController;
use App\Http\Controllers\account\CouponController;
use App\Http\Controllers\account\Blog\BlogController;
use App\Http\Controllers\account\EmpPayslipController;
use App\Http\Controllers\account\ProfitController;
use App\Http\Controllers\account\SettingsController;
use App\Http\Controllers\EmpattendanceController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmpleaveController;
use App\Http\Controllers\EmpSalaryController;
use App\Http\Controllers\ExtracostController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [UserController::class,'home'])->name('home'); //Welcome Blade (redirect to login)

Route::get('/register',[UserController::class, 'register'])->name('reg.register');//Registration
Route::post('/auth/save',[UserController::class, 'save'])->name('auth.save'); //Registration Save
Route::get('/login',[LoginController::class, 'index'])->name('login.index');//Login
Route::post('/auth/check',[LoginController::class, 'verify'])->name('auth.check');//Login verification
Route::get('/logout',[LogoutController::class, 'logout'])->name('auth.logout');//Logout



// Blog
Route::get('/blog',[UserController::class,'blog'])->name('blog');
Route::get('/blog-detail/{slug}',[UserController::class,'blogDetail'])->name('blog.detail');
Route::get('/blog/search',[UserController::class,'blogSearch'])->name('blog.search');
Route::post('/blog/filter',[UserController::class,'blogFilter'])->name('blog.filter');
Route::get('blog-cat/{slug}',[UserController::class,'blogByCategory'])->name('blog.category');
Route::get('blog-tag/{slug}',[UserController::class,'blogByTag'])->name('blog.tag');


// Post Comment 
Route::post('Blog/{slug}/comment',[BlogCommentController::class,'store'])->name('post-comment.store')->middleware('sess');


//Varrification Start

//**************** */
//**************** */
//**************** */


//Employee Routing Start
Route::group(['prefix'=>'/employee','middleware'=>['sess','employee']],function(){


        Route::get('/dashboard', [EmployeeController::class,'dashboard'])->name('dashboard.index');

        //Employee ->customer
        Route::get("/dashboard/create",[CustomerController::class,'create']);
        Route::post("/dashboard/create",[CustomerController::class,'store']);
        Route::get("dashboard/view",[CustomerController::class,'show']);
        Route::get('/searchcustomer',[CustomerController::class,'search']);
        Route::post("/dashboard/view/{id}",[CustomerController::class,'confirmstatus']);
        Route::post("/dashboard/import",[CustomerController::class,'import']);
        Route::get("/dashboard/edituser/{id}",[CustomerController::class,'edit']);
        Route::post("/dashboard/edituser/{id}",[CustomerController::class,'update']);
        Route::post("/dashboard/deleteuser/{id}",[CustomerController::class,'destroy']);
    
    
        //Employee ->profile
        Route::get("dashboard/profile",[EmployeeController::class,'profile']);
        Route::get("dashboard/editprofile/{id}",[EmployeeController::class,'edit']);
        Route::post("dashboard/editprofile/{id}",[EmployeeController::class,'update']);
    
    
        //Employee ->package
        Route::get("/dashboard/createpackage",[PackageController::class,'create'])->name('createpackage');
        Route::post("/dashboard/createpackage",[PackageController::class,'store'])->name('storepackage');
        Route::get("dashboard/viewpackage",[PackageController::class,'show'])->name('showpackage');
        Route::get("dashboard/viewpackage/details/{p_id}",[PackageController::class,'packageshow']);
        Route::get("dashboard/viewpackage/download-pdf",[PackageController::class,'downloadPDF']);
        Route::get("dashboard/editpackage/{p_id}",[PackageController::class,'edit'])->name('editpackage');
        Route::post("dashboard/editpackage/{p_id}",[PackageController::class,'update'])->name('updatepackage');
        Route::post("dashboard/deletepackage/{p_id}",[PackageController::class,'destroy'])->name('deletepackage');
    
    
        //Employee ->booking
        Route::get("dashboard/booking",[BookingController::class,'index']);
        Route::get("dashboard/createbooking/{p_id}",[BookingController::class,'create']);
        Route::post("dashboard/createbooking/{p_id}",[BookingController::class,'store']);
        Route::get("dashboard/viewbooking",[BookingController::class,'show']);
        Route::post("dashboard/viewbooking/{b_id}",[BookingController::class,'storebooking']);
        Route::post("dashboard/addtourguide/{b_id}",[BookingController::class,'tourguide']);
        Route::post("dashboard/delete/{b_id}",[BookingController::class,'destroy']);
        Route::get('/searchbooking',[BookingController::class,'search']);
        Route::get("dashboard/viewbooking/export",[BookingController::class,'export']);
    
        //Employee -> tourguide
        Route::get("dashboard/createtourguide",[TourguideController::class,'create']);
        Route::post("dashboard/createtourguide",[TourguideController::class,'store']);
    
        Route::get("dashboard/viewtourguide",[TourguideController::class,'show']);
        Route::get('/searchtourguide',[TourguideController::class,'search']);
        Route::get("dashboard/edittourguide/{id}",[TourguideController::class,'edit']);
        Route::post("dashboard/edittourguide/{id}",[TourguideController::class,'update']);
        Route::post("dashboard/deletetourguide/{id}",[TourguideController::class,'destroy']);
    
    
    
        //Employee -> feedback
        Route::get("dashboard/viewfeedback",[FeedbackController::class,'index']);
        Route::post("dashboard/viewfeedback",[FeedbackController::class,'store']);
    
        
    


});
//Employee Routing End


//**************** */
//**************** */
//**************** */


//TourGuide routing Start
Route::group(['prefix'=>'/guide','middleware'=>['sess','guide']],function(){

        
        Route::get('/guide/dashboard',[guideController::class, 'guidedashboard'])->name('guide.dashboard');
        

});
//TourGuide routing END


//**************** */
//**************** */
//**************** */


//Customer Routing Start
Route::group(['prefix'=>'/customer','middleware'=>['sess','customer']],function(){

        
        Route::get('/customer/dashboard',[UCustomerController::class, 'userdashboard'])->name('user');
        Route::get('/customer/settings',[UCustomerController::class,'usersettings']);
        Route::get('/customer/profile',[UCustomerController::class,'userprofile']);

        //User Blog comment
        Route::get('user-blog/comment',[UCustomerController::class, 'userComment'])->name('user.blog-comment.index');
        Route::delete('user-blog/comment/delete/{id}',[UCustomerController::class, 'userCommentDelete'])->name('user.blog-comment.delete');
        Route::get('user-blog/comment/edit/{id}',[UCustomerController::class, 'userCommentEdit'])->name('user.blog-comment.edit');
        Route::patch('user-blog/comment/udpate/{id}',[UCustomerController::class, 'userCommentUpdate'])->name('user.blog-comment.update');
        
});
//Customer Routing END


//**************** */
//**************** */
//**************** */


//Account routing Start
Route::group(['prefix'=>'/account','middleware'=>['sess','account']],function(){
    
    Route::get('/dashboard',[AccountController::class, 'accountdashboard'])->name('account.dashboard');


    //Accont ->profile
    Route::get("/dashboard/profile",[AccountController::class,'profile'])->name('account.profile');
    Route::get("/dashboard/editprofile/{id}",[AccountController::class,'edit'])->name('account.edit');
    Route::post("/dashboard/editprofile/{id}",[AccountController::class,'update'])->name('account.update');

    //Account ->User List
    Route::get("/dashboard/Userlist",[AccountController::class,'ulist']);

    //Account ->Coupon
    Route::post('/coupon-store',[CouponController::class,'couponStore'])->name('coupon-store');


    Route::get('/coupon',[CouponController::class,'index'])->name('coupon.index');
    Route::get('/coupon/create',[CouponController::class,'create'])->name('coupon.create');
    Route::post('/coupon/store',[CouponController::class,'store'])->name('coupon.store');
    Route::get('/coupon/edit/{id}',[CouponController::class,'edit'])->name('coupon.edit');
    Route::patch('/coupon/update/{id}',[CouponController::class,'update'])->name('coupon.update');
    Route::delete('/coupon/delete/{id}',[CouponController::class,'destroy'])->name('coupon.destroy');
    

     //Account -> BLOG category
     Route::get('/blog-category', [BlogCategoryController::class,'index'])->name('account.blog.cat');
     Route::get('/blog-category/create', [BlogCategoryController::class,'create'])->name('account.blog.create.cat');
     Route::post('/blog-category/store',[BlogCategoryController::class,'store'])->name('account.blog.store.cat');
        Route::get('/blog-category/edit/{id}',[BlogCategoryController::class,'edit'])->name('account.blog.edit.cat');
        Route::patch('/blog-category/update/{id}',[BlogCategoryController::class,'update'])->name('account.blog.update.cat');
        Route::delete('/blog-category/delete/{id}',[BlogCategoryController::class,'destroy'])->name('account.blog.delete.cat');
     
        //Account -> BLOG tag
     Route::get('/blog-tag', [BlogTagController::class,'index'])->name('account.blog.tag');
     Route::get('/blog-tag/create', [BlogTagController::class,'create'])->name('account.blog.create.tag');
     Route::post('/blog-tag/store',[BlogTagController::class,'store'])->name('account.blog.store.tag');
        Route::get('/blog-tag/edit/{id}',[BlogTagController::class,'edit'])->name('account.blog.edit.tag');
        Route::patch('/blog-tag/update/{id}',[BlogTagController::class,'update'])->name('account.blog.update.tag');
        Route::delete('/blog-tag/delete/{id}',[BlogTagController::class,'destroy'])->name('account.blog.delete.tag');
    
        //Account -> BLOG
     Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
     Route::get('/blog/create', [BlogController::class,'create'])->name('account.create.blog');
     Route::post('/blog/store',[BlogController::class,'store'])->name('account.store.blog');
        Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('account.edit.blog');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('account.update.blog');
        Route::delete('/blog/delete/{id}',[BlogController::class,'destroy'])->name('account.delete.blog');

        //Account ->Website details Settings
    Route::get('settings',[SettingsController::class,'settings'])->name('settings');
    Route::post('setting/update',[SettingsController::class,'settingsUpdate'])->name('settings.update');

    //Account ->Blog Comment crud
    Route::get('/comment',[BlogCommentController::class,'index'])->name('account.comment');
      Route::post('/comment/store',[BlogCommentController::class,'store'])->name('account.comment.store');
      Route::get('/comment/edit/{id}',[BlogCommentController::class,'edit'])->name('account.comment.edit');
      Route::post('/comment/update/{id}',[BlogCommentController::class,'update'])->name('account.comment.update');
      Route::delete('/comment/delete/{id}',[BlogCommentController::class,'destroy'])->name('account.comment.delete');


    //Account -> Employee CRUD.
    Route::get('/Employee/view', [EmpController::class,'index'])->name('account.employee');
    Route::get('/Employee/create', [EmpController::class,'create'])->name('account.employee.create');
    Route::post('/Employee/store',[EmpController::class,'store'])->name('account.employee.store');
       Route::get('/Employee/edit/{id}',[EmpController::class,'edit'])->name('account.employee.edit');
       Route::patch('/Employee/update/{id}',[EmpController::class,'update'])->name('account.employee.update');
       Route::delete('/Employee/delete/{id}',[EmpController::class,'destroy'])->name('account.employee.delete');
       
       //Account -> Employee Salary CRUD.
    Route::get('/Employee/salary/view', [EmpSalaryController::class,'index'])->name('account.employee.salary.index');
       Route::get('/Employee/salary/increment/{id}',[EmpSalaryController::class,'increment'])->name('account.employee.salary.increment');
       Route::post('/Employee/salary/increment/update/{id}',[EmpSalaryController::class,'update'])->name('account.employee.salary.increment.update');
       Route::get('/Employee/salary/show/{id}',[EmpSalaryController::class,'show'])->name('account.employee.salary.show');
       Route::get('/Employee/salary/showPDF/{id}',[EmpSalaryController::class,'details'])->name('account.employee.salary.showPDF');


       //Account -> Employee Leave CRUD.
    Route::get('/Employee/leave/view', [EmpleaveController::class,'index'])->name('account.employee.leave');
    Route::get('/Employee/leave/create', [EmpleaveController::class,'create'])->name('account.employee.leave.create');
    Route::post('/Employee/leave/store',[EmpleaveController::class,'store'])->name('account.employee.leave.store');
       Route::get('/Employee/leave/edit/{id}',[EmpleaveController::class,'edit'])->name('account.employee.leave.edit');
       Route::post('/Employee/leave/update/{id}',[EmpleaveController::class,'update'])->name('account.employee.leave.update');


       //Account -> Employee Attandance
       Route::get('/Employee/attendance/view', [EmpattendanceController::class,'index'])->name('account.employee.attendance');
       Route::get('/Employee/attendance/create', [EmpattendanceController::class,'create'])->name('account.employee.attendance.create');
       Route::post('/Employee/attendance/store',[EmpattendanceController::class,'store'])->name('account.employee.attendance.store');
       Route::get('/Employee/attendance/edit/{date}',[EmpattendanceController::class,'edit'])->name('account.employee.attendance.edit');
       Route::post('/Employee/attendance/update',[EmpattendanceController::class,'update'])->name('account.employee.attendance.update');
       Route::get('/Employee/attendance/details/{date}',[EmpattendanceController::class,'details'])->name('account.employee.attendance.details');
       Route::get('/Employee/attendance/get', [EmpattendanceController::class,'get'])->name('account.employee.attendance.get');

       //Account -> Employee Monthly Salary
       Route::get('/Employee/payroll/view', [EmpPayslipController::class,'index'])->name('account.employee.monthlysalary');
       Route::get('/Employee/MonthlySalary/get', [EmpPayslipController::class,'getSalary'])->name('account.employee.monthlysalary.get');
       Route::get('/Employee/salary/payslip/{employee_id}', [EmpPayslipController::class,'payslip'])->name('account.employee.salary.payslip');

        //Account -> Employee Monthly Salary pay
       Route::get('/Employee/Monthlysalary/view', [SalaryController::class,'index'])->name('account.employee.salary.view');
       Route::get('/Employee/Monthlysalary/pay', [SalaryController::class,'pay'])->name('account.employee.salary.pay');
       Route::get('/Employee/Monthlysalary/getsalary',[SalaryController::class,'getsalary'])->name('account.employee.salary.getsalary');
       Route::post('/Employee/Monthlysalary/update',[SalaryController::class,'update'])->name('account.employee.salary.update');


       //Account -> Extra Cost
       Route::get('/Extracost/view', [ExtracostController::class,'index'])->name('account.extracost');
       Route::get('/Extracost/create', [ExtracostController::class,'create'])->name('account.extracost.create');
       Route::post('/Extracost/store',[ExtracostController::class,'store'])->name('account.extracost.store');
       Route::get('/Extracost/edit/{id}',[ExtracostController::class,'edit'])->name('account.extracost.edit');
       Route::post('/Extracost/update/{id}',[ExtracostController::class,'update'])->name('account.extracost.update');
       Route::delete('/Extracost/delete/{id}',[ExtracostController::class,'destroy'])->name('account.extracost.delete');

       //Account -> Monthly Profit
       Route::get('/MonthlyProfit/show',[ProfitController::class,'show'])->name('account.MonthlyProfit.show');
       Route::get('/MonthlyProfit/get',[ProfitController::class,'profit'])->name('account.MonthlyProfit.get');
       Route::get('/MonthlyProfit/showPDF',[ProfitController::class,'details'])->name('account.MonthlyProfit.pdf');


       //Account -> Order
       Route::get('/Order/view', [OrderController::class,'index'])->name('account.order');
       Route::get('/Order/create', [OrderController::class,'create'])->name('account.order.create');
       Route::post('/Order/store',[OrderController::class,'store'])->name('account.order.store');
       Route::get('/Order/edit/{id}',[OrderController::class,'edit'])->name('account.order.edit');
       Route::post('/Order/update/{id}',[OrderController::class,'update'])->name('account.order.update');
       Route::delete('/Order/delete/{id}',[OrderController::class,'destroy'])->name('account.order.delete');
      });
//Account routing END


//**************** */
//**************** */
//**************** */


//Admin Routing Start
Route::group(['prefix'=>'/admin','middleware'=>['sess','admin']],function(){
    
    Route::get('/dashboard',[AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/settings',[AdminController::class,'adminsettings']);
    Route::get('/profile',[AdminController::class,'adminprofile']);
    
});

//Admin Routing END


//**************** */

//Varrification END