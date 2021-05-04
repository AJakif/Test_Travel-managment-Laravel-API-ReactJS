@extends('account.layout.main')

@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee Salary Increment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Employee</a></li>
                    <li class="breadcrumb-item active">Salary Increment</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Salary increment</h3>
          </div>
          <!-- /.card-header -->
          
            <div class="card-body">
                <form method="post" action="{{route('account.employee.salary.increment.update',[$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Name :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$user->fullname}}</label>
                        </div>
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Role :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$user->type}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Join Date :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$user->join_date}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label  class="col-form-label">Basic Salary :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$user->salary}}tk</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label  class="col-form-label">Increment Salary Ammount</label>
                                <input id="incremect_salary" type="text" name="increment_salary" placeholder="Enter Incremect Ammount"  class="form-control">
                                @error('incremect_salary')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="col-12 col-sm-4">
                        <!-- Date -->
                        <div class="form-group">
                            <label class="col-form-label">Effected Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="effected_date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>                
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
          <!-- /.card-body -->
        </div>
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