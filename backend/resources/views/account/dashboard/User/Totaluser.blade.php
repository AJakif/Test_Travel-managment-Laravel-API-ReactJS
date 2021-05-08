@extends('account.layout.main')
@section('TotalUser')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      <h1>User Information</h1>
      </div>
      <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
      </div>
    </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
          <thead>
          <tr>
          <th>Full Name</th>
          <th>User Name</th>
          <th>email</th>
          <th>Phone</th>
          <th>Bloodgroup</th>
          <th>Facebook</th>
          <th>Role</th>
          </tr>
          </thead>
          <tbody>
            @foreach($userlist as $userlists)
            <tr>
            <td>{{ $userlists->fullname }}</td>
            <td>{{ $userlists->username }}</td>
            <td>{{ $userlists->email }}</td>
            <td>{{ $userlists->phone }}</td>
            <td>{{ $userlists->bloodgroup }}</td>
            <td>{{ $userlists->facebook }}</td>
            <td>{{ $userlists->type }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
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