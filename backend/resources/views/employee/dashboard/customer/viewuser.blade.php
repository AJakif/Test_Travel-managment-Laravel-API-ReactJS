@extends('employee.layouts.main')

@section('viewuser')

@if (@isset($errors) && $errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}
      @endforeach

    </div>
@endif

<form action="/dashboard/import" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">

<input type="file" name="file"/>

<button type="submit" class="btn btn-primary">Import</button>
</div>

</form>



<div class="col-md-4">
  <form action="/searchcustomer" method="GET">
  <div class="input-group">
    <input type="search" name="search" class="form-control" placeholder="Type Customer Username">
    <span class="input-group-prepend">
      <button type="submit" class="btn btn-primary"> Search</button>
    </span>
  </div>
  </form>
</div>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Fullname</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Password</th>
        <th scope="col">Gender</th>
        <th scope="col">Customer Status</th>
        <th scope="col">Action</th>
     </tr>
    </thead>
    <tbody>
        @foreach($customerlist as $customerlists)
      <tr scope="row">
        <td scope="col">{{ $customerlists->id }}</td>
        <td scope="col">{{ $customerlists->fullname }}</td>
        <td scope="col">{{ $customerlists->username }}</td>
        <td scope="col">{{ $customerlists->email }}</td>
        <td scope="col">{{ $customerlists->address }}</td>
        <td scope="col">{{ $customerlists->phone }}</td>
        <td scope="col">{{ $customerlists->password }}</td>
        <td scope="col">{{ $customerlists->gender }}</td>
        <td>     @if ( $customerlists->status == 0)
          <div class="badge bg-danger">Not confirm</div>
          <button data-toggle="modal" data-target="#resolveComplain{{$customerlists->id }}"
              class="btn btn-warning btn-sm">
             Confirm
          </button>

          <div class="modal fade" id="resolveComplain{{$customerlists->id }}"
              aria-labelledby="ActiveComplain" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title">
                              Are you sure confirm booking?
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      
                      <div class="modal-footer">
                          <form action="/dashboard/view/{{ $customerlists->id }}" method="post">
                              @csrf
                              <input type="text" class="d-none" name="status" value="{{$customerlists->id }}" >
                              <button style="padding: 16px;" type="submit" name="submit" class="btn btn-success">
                                  Confirm
                              </button>
                            
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          @else

          <div class="badge bg-success" >Confirm</div>
          @endif
</td>
        <td>
            <a href="/dashboard/edituser/{{ $customerlists->id }}"name="btn btn-success"> Edit</a>
            <form action="/dashboard/deleteuser/{{ $customerlists->id }}" method="post">
              @csrf
              <button type="submit" name="submit" class="btn btn-danger"> Delete </button> 
          </form>
            
        </td>
      </tr>
      @endforeach
     </tbody>
 </table>
 


  <span style="padding: 30px; "> {{ $customerlist->links() }}</span>
  <style>
    .w-5{
      display:none ;
      
    }
  </style>

@endsection