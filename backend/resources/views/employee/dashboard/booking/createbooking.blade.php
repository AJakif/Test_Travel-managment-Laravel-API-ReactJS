@extends('employee.layouts.main')

@section('createbooking')
    


<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
                        
                        <div class="booking-bg">
                            <img src="{{ asset('/upload')}}/{{$package->package_image }}" class="img-responsive" alt=""  width="700">
                            <div class="container_e">  
                            <div class="child">
                               
                                
										
                               <h1 style="color: darkslateblue">  Package Name :  </h1>    
                               <input class="form-control" type="text" name="package_name"  value="{{ $package->package_name }}" readonly>
                    
                              <h1 style="color: blueviolet"> Package  Location :   </h1>  
                              <input class="form-control" type="text" name="package_location"  value="{{ $package->package_location }}" readonly>
                            </div>
                            </div></div>
                            <form action="{{ $package->p_id }}" method="POST" >
					@csrf
                            <div class="head">
                                <span class="let">M</span>
                                <span class="let" >A</span>
                                <span class="let">K</span>
                                <span class="let">E</span>
                                <span class="let">Y</span>
                                <span class="letter"></span>
                                <span class="let">U</span>
                                <span class="let" >R</span>
                              <span class="let">B</span>
                                <span class="let">O</span>
                                <span class="let">O</span>
                                <span class="let">K</span>
                                <span class="let">I</span>
                              <span class="let">N</span>
                              <span class="let">G</span>
                            </div>
						
                           

							<div class="row">
								<div class="col-md-6">
                                   
									<div class="form-group">
										<span class="form-label">Travel Check In</span>
										<input class="form-control" type="date" name="travel_date_start" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label " >Travel Check Out</span>
										<input class="form-control" type="date" name="travel_date_end" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Person</span>
                                        <input class="form-control" type="number"  name="person" value=""required>
									</div>
								</div>
							
							</div>
							<div class="row">
								<div class="col-md-6">
									<span class="form-label">Customer Username</span>
								<select class="form-control" name="username">
								@foreach($customers as $customer)
								<option class="form-control" value="{{ $customer->username }}"> {{ $customer->username }} </option>
								@endforeach
							</select>
								</div>
							</div>
						
							<div class="form-group">
								<span class="form-label">Email</span>
								<input class="form-control" type="email"  name="email" placeholder="Enter your email">
							</div>
						
							<div class="form-btn">
                                <span class="form-label ">Package ID :  </span>
                                <input class="form-control" type="text" name="pro_id"  value="{{ $package->p_id }}" readonly>
								<button class="submit-btn" name="submit" type="submit">Book Now</button>
							</div>


						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection
    	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bookingbootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bookingstyle.css') }}" />