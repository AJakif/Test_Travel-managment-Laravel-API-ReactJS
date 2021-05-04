@extends('employee.layouts.main')
@section('profile')

<form action="{{ $employee->id }}" method="POST" enctype="multipart/form-data">

  @csrf
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  
                  
                    <img src="{{ asset('/uploads')}}/{{ $employee->profile_img}}" alt="Admin" class="rounded-circle" width="150">
                   
                   
           		    
					
                    <li class="list-group-item">
                      <div class="form-file">
                         
                          <label class="form-file-label" for="customFile">
                              <span class="form-file-text">Choose Profile Picture...</span>
                              <span class="form-file-button">Browse</span>
                          </label>
                          <input name="myfile" type="file" class="form-file-input" id="customFile">
                      </div>
                  </li>
                    <div class="mt-3"> 
                      <h4> {{ session('username') }}</h4>
                
                     
                      
                   </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                 
              
                
            
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <input type="text" class="text-secondary" id="facebook" name="facebook" placeholder="facebook" value="{{ $employee->facebook}}" aria-describedby="inputGroupPrepend" required>
                    
                  </li>
                </ul>
              </div>
            </div>
            
                
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    
                      <input type="text" class="text-secondary" id="fullname" name="fullname" placeholder="fullname" value="{{ $employee->fullname}}" aria-describedby="inputGroupPrepend" >
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     
                   <input type="email" class="text-secondary" id="email" name="email" placeholder="email" value="{{ $employee->email}}" aria-describedby="inputGroupPrepend" > 
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                   
                      <input type="text" class="text-secondary" id="phone" name="phone" placeholder="phone"  value="{{ $employee->phone  }}" aria-describedby="inputGroupPrepend" required>
                    </div>
                  </div>
                  <hr>
                
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="text-secondary" id="address" name="address" placeholder="address" value="{{ $employee->address}}"  aria-describedby="inputGroupPrepend" required>
                    </div>
                  </div>
                  <hr>
                 
                 
                 
                </div>
              </div>
            
            </div>

            <input type="submit" name="update" value="update">
          </div>
        </div>

</form> 
        
@endsection