@extends('employee.layouts.main')



@section('booking')
<link href="{{ asset('css/feedback.css') }}" rel="stylesheet">
<link href="{{ asset('css/futil.css') }}" rel="stylesheet">
<form method="post" action="/employee/dashboard/createfeedback">
	@csrf
<div class="container-contact100">
	<div class="wrap-contact100">
		<form class="contact100-form validate-form">
			<span class="contact100-form-title">
				Say Hello!
			</span>

			<div class="wrap-input100 validate-input" data-validate="Name is required">
				<span class="label-input100">Your Name</span>
				<input class="input100" type="text" name="name" placeholder="Enter your name">
				<span class="focus-input100"></span>
				<span style="color:rgb(248, 10, 10)"> @error('name')
					{{ $message }}
				@enderror</span>
			</div>

			<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
				<span class="label-input100">Email</span>
				<input class="input100" type="text" name="email" placeholder="Enter your email addess">
				<span class="focus-input100"></span>
				<span style="color:rgb(248, 10, 10)"> @error('email')
					{{ $message }}
				@enderror</span>
			</div>

			<div class="wrap-input100 input100-select">
				<span class="label-input100">Choose Category</span>
				<div>
					<select class="selection-2" name="service">
						@foreach($feedbackcatagorys as $fc)
								<option class="form-control" value="{{ $fc->fc_id }}"> {{ $fc->feedbackcatagory }} </option>
						@endforeach
					
					</select>
				</div>
				<span class="focus-input100"></span>
				<span style="color:rgb(248, 10, 10)"> @error('feed_cat_id')
					{{ $message }}
				@enderror</span>
			</div>

		

			<div class="wrap-input100 validate-input" data-validate = "Message is required">
				<span class="label-input100">Message</span>
				<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				<span class="focus-input100"></span>
				<span style="color:rgb(248, 10, 10)"> @error('message')
					{{ $message }}
				@enderror</span>
			</div>

			<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
					<div class="contact100-form-bgbtn"></div>
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
</form>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
@endsection




