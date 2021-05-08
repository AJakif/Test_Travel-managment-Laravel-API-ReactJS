@extends('employee.layouts.main')


@section('adduser')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<form action="create" method="POST" class="needs-validation" novalidate>
  <div class="form-row">
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Full name</label>
      <input type="text" class="form-control" id="validationCustom02" name="fullname" placeholder="Full name" value="{{ old('fullname') }}" required>
   

      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        You Must Enter
      </div>
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
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}"aria-describedby="inputGroupPrepend" required>
        <span style="color:rgba(216, 11, 45, 0.945)"> @error('username')
          {{ $message }}
      @enderror</span>

      <div class="valid-feedback">
        Looks good!
      </div>
        <div class="invalid-feedback">
          You Must Enter
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Email</label>
      <input type="text" class="form-control" id="validationCustom03" name="email" placeholder="Email" value="{{ old('email') }}" required>
      <span style="color:rgba(209, 19, 6, 0.979)"> @error('email')
        {{ $message }}
    @enderror</span>

    <div class="valid-feedback">
      Looks good!
    </div>
      <div class="invalid-feedback">
        You Must Enter
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Address</label>
      <input type="text" class="form-control" id="validationCustom04" name="address" placeholder="Address" value="{{ old('address') }}" required>
      <span style="color:rgba(241, 10, 10, 0.973)"> @error('address')
        {{ $message }}
    @enderror</span>

    <div class="valid-feedback">
      Looks good!
    </div>

      <div class="invalid-feedback">
        You Must Enter
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Phone</label>
      <input type="text" class="form-control" id="validationCustom05" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        You Must Enter
      </div>

      <span style="color:rgb(248, 10, 10)"> @error('phone')
        {{ $message }}
    @enderror</span>
    </div>
  </div>


  <div class="col-md-3 mb-3">
    <label for="validationCustom05"> Password</label>
    
    <input onkeyup="trigger()" type="password" class="form-control" id="validationCustom05" name="password" placeholder=" Password" value="{{ old('password') }}" required>

    <div class="indicator">
      <span class="weak"></span>
      <span class="medium"></span>
      <span class="strong"></span>
    </div>
    <div class="text"></div>
    
    
   
    <div class="invalid-feedback">
      You Must Enter
    </div>
    <span style="color:rgba(250, 1, 1, 0.993)"> @error('password')
      {{ $message }}
  @enderror</span>
  </div>




  <div class="col-md-3 mb-3">
    <label for="validationCustom05">Confirm Password</label>
    <input type="password" class="form-control" id="validationCustom05" name="cpassword" value="{{ old('cpassword') }}"placeholder="Confirm Password" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      You Must Enter
    </div>
    <span style="color:rgba(245, 11, 11, 0.966)"> @error('cpassword')
      {{ $message }}
  @enderror</span>
  </div>

  <div class="col-md-3 mb-3">
    <select class="custom-select"  name="gender" value="{{ old('gender') }}" required>
      <option value="">Gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback"> You Must Enter </div>
    <span style="color:rgba(241, 1, 1, 0.973)"> @error('gender')
      {{ $message }}
  @enderror</span>
  </div>


  <div class="col-md-3 mb-3">
    


<div class="col-md-3 mb-3">
  <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
</div>
</form>
<script>
  const indicator = document.querySelector(".indicator");
  const input = document.querySelector("input");
  const weak = document.querySelector(".weak");
  const medium = document.querySelector(".medium");
  const strong = document.querySelector(".strong");
  const text = document.querySelector(".text");
  const showBtn = document.querySelector(".showBtn");
  let regExpWeak = /[a-z]/;
  let regExpMedium = /\d+/;
  let regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/;
  function trigger(){
    if(input.value != ""){
      indicator.style.display = "block";
      indicator.style.display = "flex";
      if(input.value.length <= 8 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong)))no=1;
      if(input.value.length >=15 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong))))no=2;
      if(input.value.length >= 7 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong))no=3;
      if(no==1){
        weak.classList.add("active");
        text.style.display = "block";
        text.textContent = "Your password is too week";
        text.classList.add("weak");
      }
      if(no==2){
        medium.classList.add("active");
        text.textContent = "Your password is medium";
        text.classList.add("medium");
      }else{
        medium.classList.remove("active");
        text.classList.remove("medium");
      }
      if(no==3){
        weak.classList.add("active");
        medium.classList.add("active");
        strong.classList.add("active");
        text.textContent = "Your password is strong";
        text.classList.add("strong");
      }else{
        strong.classList.remove("active");
        text.classList.remove("strong");
      }
      showBtn.style.display = "block";
      showBtn.onclick = function(){
        if(input.type == "password"){
          input.type = "text";
          showBtn.textContent = "HIDE";
          showBtn.style.color = "#23ad5c";
        }else{
          input.type = "password";
          showBtn.textContent = "SHOW";
          showBtn.style.color = "#000";
        }
      }
    }else{
      indicator.style.display = "none";
      text.style.display = "none";
      showBtn.style.display = "none";
    }
  }
</script>

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
  