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
       
        <th scope="col">Phone</th>
        <th scope="col">Password</th>
        
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
       
        <td scope="col">{{ $customerlists->phone }}</td>
        <td scope="col">{{ $customerlists->password }}</td>
        
      
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