@extends('employee.layouts.main')
@section('createpackage')

<div class="card">
    <h5 class="card-header">Edit Post Category</h5>
    <div class="card-body">
      <form method="post" action="/employee/dashboard/editpackagecatagory/{{ $pscatagory->pc_id }}">
        @csrf 
      
     
        <div class="form-group">
          <label for="packagecatagory" class="col-form-label">Package Category</label>
          <input id="packagecatagory" type="text" name="packagecatagory" placeholder="Enter package catagory"  value="{{$pscatagory->packagecatagory}}" class="form-control">
          @error('packagecatagory')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
       
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection
