@extends('employee.layouts.main')

@section('booking')
<div class="rooms">
	<div class="container">
		
		<div class="room-bottom">
			<h3>Package List</h3>
			@for($i=0; $i< count($packagelist); $i++) 
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="{{ asset('/upload')}}/{{$packagelist[$i]['package_image'] }}" class="img-responsive" alt="">
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Package ID:{{ $packagelist[$i]['p_id'] }} </h4>
					<h4>Package Name: {{ $packagelist[$i]['package_name'] }}</h4>
					<h6>Package Type : {{ $packagelist[$i]['package_type'] }}</h6>
					<p><b>Package Location :{{ $packagelist[$i]['package_location'] }}</b> </p>
					<p><b>Features : {{ $packagelist[$i]['package_feature'] }}</b></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>Taka {{ $packagelist[$i]['package_price'] }}  </h5>
					<a href="/dashboard/createbooking/{{ $packagelist[$i]['p_id'] }}" class="view">Book</a>
				</div>
				<div class="clearfix"></div>
			</div>

			@endfor
			<span style="padding: 30px; "> {{ $packagelist->links() }}</span>
			<style>
			  .w-5{
				display:none ;
				
			  }
			</style>

@endsection
<link href="{{ asset('css/bbootstrap.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/bstyle.css') }}" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
