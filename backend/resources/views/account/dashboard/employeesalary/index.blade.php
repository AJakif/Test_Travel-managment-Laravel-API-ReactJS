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
        <h1>Employee Salary Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Employee Salary List</li>
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
              <th>Full Name</th>
              <th>Mobile Number</th>
              <th>Join Date</th>
              <th>Salary</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Full Name</th>
              <th>Mobile Number</th>
              <th>Join Date</th>
              <th>Salary</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($alldata as $key => $value)
                <tr class="{{$value -> id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$value -> fullname}}</td>
                    <td>{{$value -> phone}}</td>
                    <td>{{date('d-m-Y',strtotime($value -> created_at))}}</td>
                    <td>{{$value -> salary}}</td>                   
                    <td>{{$value -> type}}</td>
                    <td>
                        <a href="{{ route('account.employee.salary.edit',[$value -> id])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fa fa-plus-circle"></i></a>
                        <a href="{{ route('account.employee.salary.show',[$value -> id])}}" class="btn btn-success btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="details" data-placement="bottom"><i class="fa fa-eye"></i></a>
                    </td>
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