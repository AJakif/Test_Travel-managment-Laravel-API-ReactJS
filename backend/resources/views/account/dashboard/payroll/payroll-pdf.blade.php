
    <div class="card shadow mb-4">  
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header">

      <div class="row">
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Name :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$details->fullname}}</label>
                        </div>
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Role :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$details->type}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label  class="col-form-label">Employee Join Date :</label>
                        </div>
                        <div class="col-sm-3 text-secondary">
                            <label  class="col-form-label">{{$details->join_date}}</label>
                        </div>
                        
                    </div>

      </div>
    <div class="card-body">

                    
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
            <th>S.N.</th>
            <th>Employee Name</th>
            <th>Basic Salary</th>
             <th>Salary (This month)</th>
            </tr>
          </thead>
          <tbody>
          
                <tr>
                @php
                    $date = date('Y-m', strtotime($totalattend['0']->date));
                    if($date !=''){
                        $where[] = ['date','like',$date.'%'];
                    }
                    $totalattend = App\Models\Employeeattendance::with(['user'])->where($where)->where('employee_id',$totalattend['0']->employee_id)->get();
                    $singleSalary = (float)$totalattend['0']['user']['salary'];
                    $salaryperday = (float)$singleSalary/30;
                    $absentcount = $totalattend->where('attend_status','Absent')->count();
                    $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
                    $totalsalary = (float)$singleSalary-(float)$totalsalaryminus;
                @endphp
                    <td>{{(1)}}</td>
                    <td>{{$details->fullname}}</td>
                    <td>{{$details->salary}}</td>
                    <td>{{round($totalsalary)}}</td>
                </tr>
          </tbody>
        </table>
        </div>
        
</div>
<!-- /.card-body -->
</div>
      <!-- /.card -->
    </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
