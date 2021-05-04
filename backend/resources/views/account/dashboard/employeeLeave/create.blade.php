@extends('account.layout.main')

@section('maincontent')
 <!-- DataTales Example -->
     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Employee Leave</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Create Leave</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Employee Leave</h3>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body">
          <form method="post" action="{{route('account.employee.leave.store')}}"  enctype="multipart/form-data">
          @csrf
            <div class="row">              
              <div class="col-12 col-sm-4">
              <div class="form-group">
                  <label class="col-form-label">Employee Name</label>
                  <select class="form-control select2" name="employee_id" style="width: 100%;">
                    <option >Select employee</option>
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}" >{{$employee->fullname}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-4">
               <!-- Date -->
               <div class="form-group">
                  <label class="col-form-label">Start Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="start_date" placeholder="Start Date" class="form-control datetimepicker-input" required data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>                
              </div>
              <div class="col-12 col-sm-4">
               <!-- Date -->
               <div class="form-group">
                  <label class="col-form-label">End Date:</label>
                    <div class="input-group date" id="reservation" data-target-input="nearest">
                        <input type="text" name="end_date" placeholder="End Date" class="form-control datetimepicker-input" required data-target="#reservation"/>
                        <div class="input-group-append" data-target="#reservation" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>                
              </div>
              
            </div>
            <!-- /.row -->
            <div class="row">

            <div class="col-12 col-sm-8">
              <div class="form-group">
                  <label class="col-form-label">Leave Purpose</label>
                  <select class="form-control select2" id="leave_purpose_id" name="leave_purpose_id" style="width: 100%;">
                    <option >Select purpose</option>
                    @foreach($leave_purpose as $purpose)
                    <option value="{{$purpose->id}}" >{{$purpose->name}}</option>
                    @endforeach
                    <option value="0">New Purpose</option>
                  </select>
                  <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose" id="add_others" style="display: none;">
                </div>
              </div>

            </div>

            <div class="form-group mb-4">
              <button class="btn btn-primary btn-sm" type="submit">Submit</button>
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
    $('#reservation').datetimepicker({
        format: 'L'
    });
  })
</script>
 <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add_others').show();
      }else{
        $('#add_others').hide();
      }
    });
   });
 </script>