<!doctype html>
<html lang="en">
  <head>
  	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/password.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

     <!-- Meta -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
     <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
     <meta name="author" content="codedthemes">
     <!-- Favicon icon -->
     <link rel="icon" href="{{URL::to('assets/images/favicon.ico')}}" type="image/x-icon">
     <!-- Google font-->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
     <!-- Required Fremwork -->
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap/css/bootstrap.min.css')}}">
      <!-- summernote -->
  <link rel="stylesheet" href="{{URL::to('assets/plugins/summernote/summernote-bs4.css')}}">
     <!-- themify-icons line icon -->
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/icon/themify-icons/themify-icons.css')}}">
   <link rel="stylesheet" type="text/css" href="{{URL::to('assets/icon/font-awesome/css/font-awesome.min.css')}}">
     <!-- ico font -->
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/icon/icofont/css/icofont.css')}}">
     <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/password.css')}}">
     <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/jquery.mCustomScrollbar.css')}}">
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
            @include('employee.include.sidebar')

        <div class="footer">
         @include('employee.include.footer')
        </div>
    	</nav>
    
  
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          
      {{--   <x-navbar/> --}}
 
          
            @include('employee.include.navbar')

             </nav>
@include('employee.include.alart')

              @yield('dashboardhome')
             @yield('adduser')
               @yield('viewuser')
               @yield('createpackage')
               @yield('viewpackage')
               @yield('addtourguide')
                  @yield('profile')
                  @yield('booking')
                  @yield('createbooking')
                  @yield('viewbooking')
                  @yield('feedback')
                  @yield('blog')

      
      </div>
		</div>

    <!-- Warning Section Ends -->
<!-- Required Jquery -->
<scrip type="text/javascript" src="{{URL::to('assets/js/jquery/jquery.min.js')}}"></script>
<scrip type="text/javascript" src="{{URL::to('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<scrip type="text/javascript" src="{{URL::to('assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{URL::to('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{URL::to('assets/js/modernizr/modernizr.js')}}"></script>
<!-- am chart -->
<script src="{{URL::to('assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{URL::to('assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{URL::to('assets/js/chart.js/Chart.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{URL::to('assets/pages/todo/todo.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{URL::to('assets/pages/dashboard/custom-dashboard.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{URL::to('assets/js/SmoothScroll.js')}}"></script>
<script src="{{URL::to('assets/js/pcoded.min.js')}}"></script>
<script src="{{URL::to('assets/js/vartical-demo.js')}}"></script>
<script src="{{URL::to('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Summernote -->
<script src="{{URL::to('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

{{-- validate --}}
<script src="{{URL::to('assets/js/query.validate.js')}}"></script>

@if (Session::has('Success'))
<script>
  toastr.success("{!! Session::get('Success') !!}");
  </script>
@endif

</body>
</html>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
   
</html>