@extends('employee.layouts.main')


@section('createpackage')
    

<form action="{{ route('storepackage') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
  
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Package Name</label>
      <input type="text" class="form-control" id="validationCustom02" name="package_name" placeholder="Create package name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Package Location</label>
      <input type="text" class="form-control" id="validationCustom03" name="package_location" placeholder="Package location" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
  
    
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Total Package Price</label>
      <input type="text" class="form-control" id="validationCustom04" name="package_price" placeholder="Package Price" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Package Feature</label>
      <input type="text" class="form-control" id="validationCustom05" name="package_feature" placeholder="package_feature" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
    <div class="col-md-3 mb-3">
        <select class="custom-select"  name="package_type" required>
          <option value="">Package Type</option>
          <option value="Family">Family</option>
          <option value="Couple">Couple</option>
          <option value="Corporate">Corporate</option>
          <option value="other">other</option>
        </select>
        <div class="invalid-feedback">Example invalid custom select feedback</div>
      </div>
 
  <div class="form-col-md-3 mb-3">
    <label for="validationCustom05">Package Details</label>
    <textarea class="form-control" id="validationCustom05" name="package_details" rows="5"></textarea>
    <div class="invalid-feedback">
        Please provide a valid zip.
      </div>  
</div>
  
  <div class="col-md-3 mb-3">
    <label for="validationCustom05">Last Booking Date</label>
    <input type="Date" class="form-control" id="validationCustom05" name="package_time_duration" placeholder="package_Date" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>




  <div class="col-md-3 mb-3">
    
  <div class="custom-file">
    <input name="package_image" type="file" class="form-file-input" id="validatedCustomFile">
    
    <label class="custom-file-label" name="package_image" for="validatedCustomFile">Package Image</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>
</div>

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