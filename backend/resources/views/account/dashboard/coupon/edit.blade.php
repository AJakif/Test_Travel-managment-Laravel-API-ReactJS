@extends('account.layout.main')
@section('maincontent')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Coupon</h5>
        <div class="card-body">
          <form method="post" action="{{route('coupon.update',[$coupon->id])}}">
            @csrf 
            @method('PATCH')
            <div class="form-group">
              <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
              <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"  value="{{$coupon->code}}" class="form-control">
              @error('code')
              <span class="text-danger">{{$message}}</span>
              @enderror
              </div>
      
              <div class="form-group">
                  <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
                  <select name="type" class="form-control">
                      <option value="fixed" {{(($coupon->type=='fixed') ? 'selected' : '')}}>Fixed</option>
                      <option value="percent" {{(($coupon->type=='percent') ? 'selected' : '')}}>Percent</option>
                  </select>
                  @error('type')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
      
              <div class="form-group">
                  <label for="inputTitle" class="col-form-label">Value <span class="text-danger">*</span></label>
                  <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"  value="{{$coupon->value}}" class="form-control">
                  @error('value')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              
            <div class="form-group">
              <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
              <select name="status" class="form-control">
                <option value="active" {{(($coupon->status=='active') ? 'selected' : '')}}>Active</option>
                <option value="inactive" {{(($coupon->status=='inactive') ? 'selected' : '')}}>Inactive</option>
              </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <button class="btn btn-success" type="submit">Update</button>
            </div>
          </form>
        </div>
        </div>
      </div>
      </div>
  </div>
</section>
@endsection