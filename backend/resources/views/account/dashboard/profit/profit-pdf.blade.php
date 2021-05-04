
    <div class="card shadow mb-4">  
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header">

      <div class="row">
      <div class="col-sm-2">
                            <label  class="col-form-label">>-----Start----->></label>
                                <label  class="col-form-label">Month : {{date('F',strtotime($start_date))}}</label>
                                <label  class="col-form-label">Year : {{date('Y',strtotime($start_date))}}</label>
                                
                            </div>
                            <div class="col-sm-2 ">
                            <label  class="col-form-label">>-----End----->></label>
                                <label  class="col-form-label">Month : {{date('F',strtotime($end_date))}}</label>
                                <label  class="col-form-label">Year : {{date('Y',strtotime($end_date))}}</label>
                            </div>
      </div>
    <div class="card-body">

                    
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
            <th>Earning From Package</th>
                                                <th>Extra cost</th>
                                                <th>Employee Salary</th>
                                                <th>Total Cost</th>
                                                <th>Total Profit</th>
            </tr>
          </thead>
          <tbody>
          
                <tr>
                @php
                $package_sell= App\Models\Order::whereBetween('date',[$start_date, $end_date])->sum('amount');
                $extra_cost= App\Models\ExtraCost::whereBetween('date',[$start_date, $end_date])->sum('amount');
                $emp_salary = App\Models\EmployeeSalary::whereBetween('date',[$start_date, $end_date])->sum('amount');
                $total_cost = $extra_cost + $emp_salary;
                $profit = $package_sell-$total_cost;
                @endphp
                <td>{{$package_sell}}</td>
                                                    <td>{{$extra_cost}}</td>
                                                    <td>{{$emp_salary}}</td>
                                                    <td>{{$total_cost}}</td>
                                                    <td>{{$profit}}</td>
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
