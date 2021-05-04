@extends('account.layout.main')
@section('maincontent')

<div class="card shadow mb-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Monthly Salary Pay</h1>
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
                                	<form method="GET" action="{{route('account.employee.salary.getsalary')}}" >
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label class="col-form-label"> Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="date" id="date" placeholder="Date" class="form-control datetimepicker-input" required data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
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
                        @if(isset($editdata))
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <label  class="col-form-label">Month : {{date('F',strtotime($date))}}</label>
                                
                            </div>
                            <div class="col-sm-2 ">
                                <label  class="col-form-label">Year : {{date('Y',strtotime($date))}}</label>
                            </div>
                        </div>
                        <form action="{{route('account.employee.salary.update')}}" method="POST">
                        @csrf
                            <table  class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Employee Name</th>
                                                <th>Basic Salary</th>
                                                <th>Salary (This month)</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($editdata as $key => $attend)
                                                <tr>
                                                @php
                                                $account_salary = \App\Models\EmployeeSalary::where('employee_id',$attend->employee_id)->where($where)->first();
                                                if($account_salary !=null){
                                                    $checked= 'checked';
                                                }else{
                                                    $checked='';
                                                }
                                                $totalattend = $attend->where($where)->where('employee_id',$attend->employee_id)->get();
                                                $absentcount = $totalattend->where('attend_status','Absent')->count();
                                                $salary = (float)$attend['user']['salary'];
                                                $salaryperday = (float)$salary/30;
                                                $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                                                $totalsalary = (float)$salary-(float)$totalsalaryminus;
                                                @endphp
                                                
                                                    <td>{{($key+1)}}</td>
                                                    <td>{{$attend['user']['fullname']}}</td>
                                                    <td>{{$attend['user']['salary']}}</td>
                                                    <td>{{round($totalsalary)}}
                                                    <input type="hidden" name="amount[]" value="{{round($totalsalary)}}">
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="date" value="{{$date}}">
                                                        <input type="hidden" name="employee_id[]" value="{{$attend->employee_id}}">
                                                        <input type="checkbox" name="checkmanage[]" value="{{$key}}" checked="{{$checked}}" style="transform: scale(1.5);margin-left: 10px;">
                                                    </td>
                        
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> 
                                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px;">Submit</button>
                                </form>                                                                                              
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
  })
</script>


@endsection

