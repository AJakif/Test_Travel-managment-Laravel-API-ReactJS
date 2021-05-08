@extends('employee.layouts.main')

@section('viewuser')

@if (@isset($errors) && $errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}
      @endforeach

    </div>
@endif




<div class="col-md-4">
  <form action="/employee/searchtourguide" method="GET">
  <div class="input-group">
    <input type="search" name="search" class="form-control" placeholder="Type Tourguide Username">
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
        
        
        <th scope="col">Action</th>
     </tr>
    </thead>
    <tbody>
        @foreach($tourguidelist as $tourguidelist)
      <tr scope="row">
        <td scope="col">{{ $tourguidelist->t_id }}</td>
        <td scope="col">{{ $tourguidelist->fullname }}</td>
        <td scope="col">{{ $tourguidelist->username }}</td>
        <td scope="col">{{ $tourguidelist->email }}</td>
       
        <td scope="col">{{ $tourguidelist->phone }}</td>
        
        
      
        <td>
            <a href="/employee/dashboard/edittourguide/{{ $tourguidelist->t_id }}"name="btn btn-success"> Edit</a>
            <form action="/employee/dashboard/deletetourguide/{{ $tourguidelist->t_id }}" method="post">
              @csrf
              <button type="submit" name="submit" class="btn btn-danger"> Delete </button> 
          </form>
            
        </td>
      </tr>
      @endforeach
     </tbody>
 </table>
 




@endsection