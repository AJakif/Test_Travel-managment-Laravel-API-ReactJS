@extends('employee.layouts.main')


@section('adduser')
    

<form action="{{ $tourguide->id }}" method="POST" class="needs-validation" novalidate>
  <div class="form-row">
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Full name</label>
      <input type="text" class="form-control" id="validationCustom02" name="fullname" placeholder="Full name" value="{{ $tourguide->fullname }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Username</label>
      <input type="text" class="form-control" id="validationCustom02" name="username" placeholder="username" value="{{ $tourguide->username }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Email</label>
      <input type="text" class="form-control" id="validationCustom03" name="email" value="{{ $tourguide->email }}" placeholder="Email" required>
      <div class="invalid-feedback">
        Please provide a Email.
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Phone</label>
      <input type="text" class="form-control" id="validationCustom05" name="phone" value="{{ $tourguide->phone  }}" placeholder="Phone" required>
      <div class="invalid-feedback">
        Please provide a Phone
      </div>
    </div>
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