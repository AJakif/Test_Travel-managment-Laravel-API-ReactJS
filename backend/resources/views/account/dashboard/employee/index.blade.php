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
        <h1>Employee Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">Employee List</li>
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
      <div class="card-header py-3">
      <a href="{{route('account.employee.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Employee</a>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
            <th>S.N.</th>
              <th>Full Name</th>
              <th>Mobile Number</th>
              <th>Address</th>
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
              <th>Address</th>
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
                    <td>{{$value -> address}}</td>
                    <td>{{date('d-m-Y',strtotime($value -> created_at))}}</td>
                    <td>{{$value -> salary}}</td>                   
                    <td>{{$value -> type}}</td>
                    <td>
                        <a href="{{ route('account.employee.edit',[$value -> id])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('account.employee.delete',[$value -> id])}}">
                      @csrf 
                      @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id="{{$value->id}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
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