@extends('employee.layouts.main')
@section('createpackage')

<div class="card">
    <h5 class="card-header">Add Package Category</h5>
    <div class="card-body">
      <form method="post" action="/employee/dashboard/createpackagecatagory">
        {{csrf_field()}}
        <div class="form-group">
          <label for="packagecatagory" class="col-form-label">Package Category</label>
          <input id="packagecatagory" type="text" name="packagecatagory" placeholder="Enter package catagory"  value="{{old('packagecatagory')}}" class="form-control">
          
          
          @error('packagecatagory')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection
