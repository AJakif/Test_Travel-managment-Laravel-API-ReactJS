@extends('account.layout.main')
@section('maincontent')

<div class="card shadow mb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Monthly Salary Manage</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Employee</a></li>
                        <li class="breadcrumb-item active">Monthly Salary</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<div class="card shadow mb-4">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4>Select Date</h4>
                        </div>
                        <div class="card-body">
                      
                            <div class="row">                                 
                                <div class="col-12 col-sm-3">
                                	<form method="GET" action="{{route('account.MonthlyProfit.get')}}" >
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label class="col-form-label">Start Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control datetimepicker-input" required data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">End Date:</label>
                                        <div class="input-group date" id="reservation" data-target-input="nearest">
                                            <input type="text" name="end_date" id="end_date" placeholder="End Date" class="form-control datetimepicker-input" required data-target="#reservation"/>
                                            <div class="input-group-append" data-target="#reservation" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2" id="btn-search">
                                       <!-- <a class="btn btn-primary btn-sm "  id="search" title="search" style=" color: white"><i class="fas fa-search"></i> Search</a> -->  
                                       <button class="btn btn-primary btn-sm " type="submit" title="search" style=" color: white"> Search</button>       
                                    </div> 
                                    </form>
                                </div>
                                    
                            </div>
                      
                        </div>
                        @if(isset($start_date))
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                            <label  class="col-form-label">-----Start-----</label>
                                <label  class="col-form-label">Month : {{date('F',strtotime($start_date))}}</label>
                                <label  class="col-form-label">Year : {{date('Y',strtotime($start_date))}}</label>
                                
                            </div>
                            <div class="col-sm-2 ">
                            <label  class="col-form-label">-----End-----</label>
                                <label  class="col-form-label">Month : {{date('F',strtotime($end_date))}}</label>
                                <label  class="col-form-label">Year : {{date('Y',strtotime($end_date))}}</label>
                            </div>
                        </div>
                            <table id="example2" class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Earning From Package</th>
                                                <th>Extra cost</th>
                                                <th>Employee Salary</th>
                                                <th>Total Cost</th>
                                                <th>Total Profit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            
                                                    <td>{{$package_sell}}</td>
                                                    <td>{{$extra_cost}}</td>
                                                    <td>{{$emp_salary}}</td>
                                                    <td>{{$total_cost}}</td>
                                                    <td>{{$profit}}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success" title="Profit" target="_blank" href="{{route('account.MonthlyProfit.pdf',['start_date'=> $sdate,'end_date' => $edate])}}">Profit</a>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>                                                                                               
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




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
  });

  $(function () {
    //Date range picker
    //Date range picker
    $('#reservation').datetimepicker({
        format: 'L'
    });
  })
</script>


@endsection

