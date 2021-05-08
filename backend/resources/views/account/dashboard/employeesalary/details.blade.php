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

     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Employee Salary increment Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Employee Salary increment List</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
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
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Previous Salary</th>
              <th>Increment</th>
              <th>Present Salary</th>
              <th>Effected Date</th>
              
            </tr>
          </tfoot>
          <tbody>
          @foreach($SalaryLog as $key => $value)
                <tr >
                @if($key == '0')
                <td>{{$key+1}}</td>
                <td class='text-center' colspan='4'><strong>Joining Salary</strong>{{$value -> previous_salary}}</td>
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
@endsection