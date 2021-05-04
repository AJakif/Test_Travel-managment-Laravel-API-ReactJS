@extends('account.layout.main')

@section('maincontent')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Extra Cost</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Extra Cost</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
 </div>
 <div class="card shadow mb-4">
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      
      <form action="{{route('account.extracost.update',[$editdata -> id])}}"  method="POST"  enctype="multipart/form-data" >
      @csrf
    <div class="card-body">
    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label  class="col-form-label"> Amount</label>
                                <input id="amount" type="text"  required name="amount" value="{{$editdata->amount}}" placeholder="Enter Amount"  class="form-control">
                                @error('amount')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="col-12 col-sm-4">
                        <!-- Date -->
                        <div class="form-group">
                            <label class="col-form-label">Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="date"  required class="form-control datetimepicker-input" value="{{date('Y-m-d',strtotime($editdata->date))}}" placeholder="{{$editdata->date}}"  data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>                
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label  class="col-form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" required placeholder="Write Description" >{{$editdata->description}}</textarea>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label  class="col-form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>

        </div>
        </form>

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
  </div>


  <!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>

<script>
  $(function () {
    //Date range picker
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  })
</script>
@endsection