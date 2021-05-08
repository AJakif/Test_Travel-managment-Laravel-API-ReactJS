@extends('employee.layouts.main')

@section('booking')
<div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
         @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('error')}}
            </div>
        @endif
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Feedback Category Lists</h6>
      <a href="/employee/dashboard/createfeedback" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Feedback Category</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($feedbacklist)>0)
        <table class="table table-bordered" id="post-category-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Feedback Id</th>
              <th>Feedback Categories</th>
              <th>Sander name</th>
              <th>Sander Email</th>
              <th>Massage</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Feedback Id</th>
              <th>Feedback Categories</th>
              <th>Sander name</th>
              <th>Sander Email</th>
              <th>Massage</th>
              
              <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($feedbacklist as $data)   
                <tr>
                    <td>{{$data->f_id}}</td>
                    <td>{{$data->cat_info->feedbackcatagory}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->message}}</td>
                 
                    <td>
                       
                  
                        <form action="/employee/dashboard/deletefeedback/{{ $data->f_id }}" method="post">
                          @csrf
                          <button class="btn btn-danger btn-sm dltBtn"  style="color:rgb(255, 253, 253)" type="submit" name="submit" class="btn btn-danger"> Delete </button> 
                      </form>
                    </td>
                 
                </tr>  
            @endforeach
          </tbody>
        </table>
      
        @else
          <h6 class="text-center">No Feedback Feedback found!!! </h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#post-category-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush