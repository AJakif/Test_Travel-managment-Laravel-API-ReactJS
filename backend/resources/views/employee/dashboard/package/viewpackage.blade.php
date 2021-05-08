@extends('employee.layouts.main')


@section('createpackage')
<a href="/employee/dashboard/viewpackage/download-pdf">Download PDF</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Package Id</th>
        <th scope="col">Package Name</th>
        <th scope="col">Package Type</th>
        <th scope="col">Package Location</th>
        <th scope="col">Package Price</th>
        <th scope="col">Package Status</th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    <tbody>
       @foreach ( $packagelist as $pc )
         
   
      <tr scope="row">
        <td style="color: blue">{{ $pc->p_id }}</td>
        <td  >{{ $pc->package_name }}</td>
        <td>{{ $pc->cat_info->packagecatagory }}</td>
        <td>{{ $pc->package_location }}</td>
        <td>{{ $pc->package_price }}</td>
        <td>{{ $pc->status }}</td>
        <td>
            <a href="/employee/dashboard/editpackage/{{ $pc->p_id }}"name="btn btn-success"> Edit</a>
            
            <a href="/employee/dashboard/viewpackage/details/{{ $pc->p_id }}" name="btn btn-info"> Details</a>
            <form action="/employee/dashboard/deletepackage/{{ $pc->p_id}}" method="post">
              @csrf
              <button type="submit" name="submit" class="btn btn-danger"> Delete </button> 
          </form>
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection