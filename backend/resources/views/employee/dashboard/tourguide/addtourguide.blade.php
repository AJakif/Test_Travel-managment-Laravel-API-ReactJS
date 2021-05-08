@extends('employee.layouts.main')


@section('addtourguide')
    

<form action="createtourguide" method="POST" class="needs-validation" novalidate>
  <div class="form-row">
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Full name</label>
      <input type="text" class="form-control" id="validationCustom02" name="fullname" placeholder="Full name" value="" required>
      <span style="color:rgba(231, 19, 19, 0.904)"> @error('fullname')
        {{ $message }}
    @enderror</span>
    </div>
    <div class="col-md-4 mb-3">
      <label for="username">Username</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-describedby="inputGroupPrepend" required>
        <span style="color:rgba(231, 19, 19, 0.904)"> @error('username')
          {{ $message }}
      @enderror</span>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Email</label>
      <input type="text" class="form-control" id="validationCustom03" name="email" placeholder="Email" required>
      <span style="color:rgba(231, 19, 19, 0.904)"> @error('email')
        {{ $message }}
    @enderror</span>
    </div>
  
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Phone</label>
      <input type="text" class="form-control" id="validationCustom05" name="phone" placeholder="Phone" required>
      <span style="color:rgba(231, 19, 19, 0.904)"> @error('phone')
        {{ $message }}
    @enderror</span>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="validationCustom05"> Password</label>
    <input type="password" class="form-control" id="validationCustom05" name="password" placeholder=" Password" required>
    <span style="color:rgba(231, 19, 19, 0.904)"> @error('password')
      {{ $message }}
  @enderror</span>
  </div>
  <div class="col-md-3 mb-3">
    <label for="validationCustom05">Confirm Password</label>
    <input type="password" class="form-control" id="validationCustom05" name="cpassword" placeholder="Confirm Password" required>
    <span style="color:rgba(231, 19, 19, 0.904)"> @error('cpassword')
      {{ $message }}
  @enderror</span>
  </div>




  <div class="col-md-3 mb-3">


<div class="col-md-3 mb-3">
  <button class="btn btn-primary" name="submit" type="submit">Submit</button>
</div>
</form>

@endsection
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>