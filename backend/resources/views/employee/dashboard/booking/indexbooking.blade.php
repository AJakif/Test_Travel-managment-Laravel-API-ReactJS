@extends('employee.layouts.main')

@section('booking')
<div class="rooms">
	<div class="container">
		
		<div class="room-bottom">
			<h3>Package List</h3>
			@foreach ( $packagelist as $pc )
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="{{ asset('/upload')}}/{{$pc->package_image}}" class="img-responsive" alt="">
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Package ID:{{ $pc->p_id }} </h4>
					<h4>Package Name: {{ $pc->package_name }}</h4>
					<h6>Package Type : {{ $pc->cat_info->packagecatagory  }}</h6>
					<p><b>Package Location :{{ $pc->package_location }}</b> </p>
					<p><b>Features : {{ $pc->package_feature }}</b></p>
					<p><b>Status : {{ $pc->status }}</b></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>Taka {{  $pc->package_price }}  </h5>
					<a href="/employee/dashboard/createbooking/{{ $pc->p_id }}" class="view">Book</a>
				</div>
				<div class="clearfix"></div>
			</div>

			@endforeach
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
