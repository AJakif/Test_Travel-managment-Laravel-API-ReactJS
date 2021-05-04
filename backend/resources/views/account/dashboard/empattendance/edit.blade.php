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
            <li class="breadcrumb-item active">Add Attendance</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-default">
          <!-- /.card-header -->
          
          
          <form method="post" action="{{route('account.employee.attendance.store')}}"  enctype="multipart/form-data">
          @csrf
          <div class="card-body">
          <div class="col-12 col-sm-4">
               <!-- Date -->
               <div class="form-group">
                  <label class="col-form-label">Attendance Date</label>
                   <div class="input-group date" >
                        <input type="text" name="date" value="{{$editdata['0']['date']}}"  id="datepicker" placeholder="" class="form-control datetimepicker-input"  autocomplete="off" />
                        <div class="input-group-append" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                   <!-- <input type="text" id="datepicker"  value="{{$editdata['0']['date']}}" name="date" width="276" />-->
                </div>                
              </div>
          <table>
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL.</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 25%">Attendance Status</th>
                </tr>
                <tr>
                    <th class="text-center btn present_all" style="display: table-cell; background-color: yellow;">Present</th>
                    <th class="text-center btn leave_all" style="display: table-cell; background-color: yellow;">Leave</th>
                    <th class="text-center btn absent_all" style="display: table-cell; background-color: yellow;">Absent</th>
                </tr>
            </thead>
            <tbody>
                @foreach($editdata as $key => $data)
                    <tr id="div{{$data->id}}" class="text-center">
                        <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}" class="employee_id">
                        <td>{{$key+1}}</td>
                        <td>{{$data['user']['fullname']}}</td>
                        <td colspan="3">
                            <div class="switch-toggle switch-3 switch-candy">
                                <input class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" type="radio" {{($data->attend_status=="Present")?'checked':""}}/>
                                <label for="present{{$key}}">Present</label>

                                <input class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" type="radio" {{($data->attend_status=="Leave")?'checked':""}} />
                                <label for="present{{$key}}">Leave</label>

                                <input class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" type="radio" {{($data->attend_status=="Absent")?'checked':""}}/>
                                <label for="absent{{$key}}">Absent</label>
                                <a></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <br>
          <div class="form-group mb-4">
              <button class="btn btn-primary btn-sm" type="submit">Submit</button>
            </div>
          </div>
        </form>
          
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>

<script type="text/javascript">

  $(function () {
    $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click','.present',function(){
        $(this).presents('tr').find(".datetime").css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });
    $(document).on('click','.leave',function(){
        $(this).presents('tr').find(".datetime").css('pointer-events','').css('background-color','white').css('color','#495057');
    });
    $(document).on('click','.absent',function(){
        $(this).presents('tr').find(".datetime").css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });

</script>
<script type="text/javascript">
    $(document).on('click','.present_all',function(){
        $("input[value=Present").prop('checked',true);
        $(".datetime").css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });
    $(document).on('click','.leave_all',function(){
        $("input[value=Leave").prop('checked',true);
        $(".datetime").css('pointer-events','').css('background-color','white').css('color','#495057');
    });
    $(document).on('click','.absent_all',function(){
        $("input[value=Absent").prop('checked',true);
        $(".datetime").css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });

</script>
