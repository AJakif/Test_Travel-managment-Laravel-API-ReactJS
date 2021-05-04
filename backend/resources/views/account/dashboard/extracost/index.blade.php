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
    
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header py-3">
      <a href="{{route('account.extracost.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Extra Cost</a>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
            <th>S.N.</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>S.N.</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($alldata as $key => $value)
                <tr class="{{$value -> id}}">
                    <td>{{$key+1}}</td>
                    <td>{{date('d-m-Y',strtotime($value -> date))}}</td>
                    <td>{{$value -> amount}}</td>
                    <td>{{$value -> description}}</td>
                    <td>
                        <img src="{{ asset('/upload/cost_image')}}/{{ $value->image}}" class="img-square elevation-2" width="90px" height="60px">
                    </td>
                    <td>
                        <a href="{{ route('account.extracost.edit',[$value -> id])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
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