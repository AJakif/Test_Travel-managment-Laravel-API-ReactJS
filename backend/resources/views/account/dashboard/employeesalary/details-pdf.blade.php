
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
              <th>Previous Salary</th>
              <th>Increment</th>
              <th>Present Salary</th>
              <th>Effected Date</th>
            </tr>
          </thead>
          <tbody>
          @foreach($SalaryLog as $key => $value)
                <tr >
                @if($key == '0')
                <td>{{$key+1}}</td>
                <td class='text-center' colspan='4'><strong>Joining Salary : </strong>{{$value -> previous_salary}}</td>
                @else
                    <td>{{$key+1}}</td>
                    <td>{{$value -> previous_salary}}</td>
                    <td>{{$value -> increment_salary}}</td>
                    <td>{{$value -> present_salary}}</td>
                    <td>{{date('d-m-Y',strtotime($value -> effected_date))}}</td>
                    
                @endif
                </tr>
                @endforeach
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
