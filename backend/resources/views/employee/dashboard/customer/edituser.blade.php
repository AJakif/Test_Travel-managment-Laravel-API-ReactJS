@extends('employee.layouts.main')


@section('adduser')
    

<form action="{{ $customer->id }}" method="POST" class="needs-validation" novalidate>
  <div class="form-row">
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Full name</label>
      <input type="text" class="form-control" id="validationCustom02" name="fullname" placeholder="Full name" value="{{ $customer->fullname }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Email</label>
      <input type="text" class="form-control" id="validationCustom03" name="email" value="{{ $customer->email }}" placeholder="Email" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Address</label>
      <input type="text" class="form-control" id="validationCustom04" name="address" value="{{ $customer->address  }}" placeholder="Address" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Phone</label>
      <input type="text" class="form-control" id="validationCustom05" name="phone" value="{{ $customer->phone  }}" placeholder="Phone" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="validationCustom05"> Password</label>
    <input type="Password" class="form-control" id="validationCustom05" name="password" value="{{ $customer->password }}" placeholder=" Password" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>


  <div class="col-md-3 mb-3">
    <select class="custom-select"  name="gender" required>
      <option value="">Gender</option>
      <option value="male" @if($customer['gender'] == 'male') selected @endif>Male</option>
      <option value="female" @if($customer['gender'] == 'female') selected @endif>Female</option>
      <option value="other" @if($customer['gender'] == 'other') selected @endif>Other</option>
    </select>
    <div class="invalid-feedback">Example invalid custom select feedback</div>
  </div>


  <div class="col-md-3 mb-3">


<div class="col-md-3 mb-3">
  <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
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