@extends('account.layout.main')

@section('blog')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
         @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('error')}}
            </div>
        @endif
         </div>
     </div>
 </div>

     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Employee Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Create Employee</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Regester Employee</h3>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body">
          <form method="post" action="{{route('account.employee.store')}}">
          @csrf
            <div class="row">
            <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Full Name</label>
                <input id="fullname" type="text" name="fullname" placeholder="Enter Full name"  value="{{old('fullname')}}" class="form-control">
                @error('fullname')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
                
              </div>
              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">User Name</label>
                <input id="username" type="text" name="username" placeholder="Enter User name"  value="{{old('username')}}" class="form-control">
                @error('username')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>

              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Email</label>
                <input id="email" type="text" name="email" placeholder="Enter Email"  value="{{old('email')}}" class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">

            <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Password</label>
                <input type="password" class="form-control" name= "password" placeholder="Enter Password" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>

              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Phone Number</label>
                <input id="phone" type="text" name="phone" placeholder="Enter Phone Number"  value="{{old('phone')}}" class="form-control">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>
              <div class="col-12 col-sm-4">
              <div class="form-group">
                  <label class="col-form-label">Gender</label>
                  <select class="form-control select2" name="gender" style="width: 100%;">
                    <option >Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    
                  </select>
                </div>
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
            <div class="row">

            <div class="col-12 col-sm-4">
              <div class="form-group">
                  <label class="col-form-label">Role</label>
                  <select class="form-control select2" name="type" style="width: 100%;">
                    <option >Select Role</option>
                    <option value="employee">Employee</option>
                    <option value="guide">Guide</option>
                    
                  </select>
                </div>
              </div>

              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Salary</label>
                <input id="salary" type="text" name="salary" placeholder="Enter Salary"  value="{{old('salary')}}" class="form-control">
                @error('salary')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>


            <div class="col-12 col-sm-4">
               <!-- Date -->
               <div class="form-group">
                  <label class="col-form-label">Join Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="join_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>                
              </div>
              <!-- /.col -->
              <!-- /.col -->
            </div>
            <div class="row">

            <div class="form-group col-md-4">
            <label class="col-form-label">Profile Picture</label>
            <input type="file" name="image" class="form-control form-control-sm" id="image">
            </div>
            </div>
            <div class="form-group mb-3">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection


<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>

<script>
  $(function () {
    //Date range picker
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  

  

  })
</script>