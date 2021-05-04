@extends('account.layout.main')

@section('maincontent')

     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Employee Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Edit Employee</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <form action="{{route('account.employee.update',[$user->id])}}" method="POST"  enctype="multipart/form-data" >
    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Regester Employee</h3>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body">
          <form method="post" action="{{route('account.employee.update',[$user->id])}}">
          @csrf
            <div class="row">
            <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Full Name</label>
                <input id="fullname" type="text" name="fullname" placeholder="Enter Full name"  value="{{$user->fullname}}" class="form-control">
                @error('fullname')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
                
              </div>
              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">User Name</label>
                <input id="username" type="text" name="username" placeholder="Enter User name"  value="{{$user->username}}" class="form-control">
                @error('username')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>

              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label  class="col-form-label">Email</label>
                <input id="email" type="text" name="email" placeholder="Enter Email"  value="{{$user->email}}" class="form-control">
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
                <label  class="col-form-label">Phone Number</label>
                <input id="phone" type="text" name="phone" placeholder="Enter Phone Number"  value="{{$user->phone}}" class="form-control">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div> 
              </div>
              
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
            <div class="row">

            </div>
            <div class="row">

            <div class="form-group col-md-4">
            <label class="col-form-label">Profile Picture</label>
            <div class="image">
               <img src="{{ asset('/upload/user_image')}}/{{ $user->profile_img}}" class="img-circle elevation-2" alt="{{ $user->username }}" width="150">
            </div>
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
@endsection



  