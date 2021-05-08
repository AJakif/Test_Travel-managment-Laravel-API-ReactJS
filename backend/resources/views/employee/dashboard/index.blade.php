@extends('employee.layouts.main')



@section('dashboardhome')


<div class="pcoded-wrapper">
   
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                    <div class="row">

                            <!-- order-card start -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total Booking</h6>
                                        <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $booking }}</span></h2>
                                        <p class="m-b-0"><a href="/employee/dashboard/viewbooking">See more</a></p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total User</h6>
                                        <h2 class="text-right"><i class="ti-tag f-left"></i><span>{{ $LoggedUserInfo->count() }}</span></h2>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total packages</h6>
                                        <h2 class="text-right"><i class="ti-wallet f-left"></i><span>{{ $package }}</span></h2>
                                        <p class="m-b-0"><a href="/employee/dashboard/viewpackage">See more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Total Tourguide</h6>
                                        <h2 class="text-right"><i class="ti-wallet f-left"></i><span>{{$tourguide }}</span></h2>
                                        <p class="m-b-0"><a href="/employee/dashboard/viewtourguide">See more</a></p>
                                    </div>
                                </div>
                            </div>
                         
                            <!-- order-card end -->

                            <!-- statustic and process start -->
                            <div class="col-lg-8 col-md-12">
   
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Customer Feedback</h5>
                                    </div>
                                    <div class="card-block">
                                        <span class="d-block text-c-blue f-24 f-w-600 text-center">{{ $feedback }}</span>
                                        <p class="m-b-0"><a href="/employee/dashboard/viewfeedback">See more</a></p>
                                    </div>
                                </div>
                            </div>
                            <!-- statustic and process end -->
                            <!-- tabs card start -->
                            <div class="col-sm-12">
                                <div id="chart-container"></div>
                            </div>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
var datas = <?php echo json_encode($datas) ?>

Highcharts.chart('chart-container',{
    title:{
        text:'New User Growth'
    }, 
    subtitle:{
        text:'New User '
    }, 
    xAxis:{
        categories:['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
    }, 
    yAxis:{
        title:{
            text:'Number Of New Customer'
        }
    }, 
    legend:{
        layout:'vertical',
        align:'right',
        verticalAlign:'middle'
    }, 
    plotOptions:{
      series:{
          allowPointSelect:true
      }
     },
     series:[
         {
             name:'New Customer',
             data:datas

     }],
     responsive:{
        rules:[
            {
                condition:{
                    maxWidth:500
                }, 
                chartOptions:{
                    legend:{
                        layout:'horizontal',
                        align:'center',
                        verticalAlign:'bottom'
                    }
                }
            }
        ]
     }


})

</script>
/* <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!} */
                            </div>
                            <!-- tabs card end -->

                            <!-- social statustic start -->
                          
                          
                           
                            <!-- social statustic end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('title')
  Dashboard
@endsection