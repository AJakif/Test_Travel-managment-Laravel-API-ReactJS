
    
<div class="p-4 pt-5">
    <a  href="#" class="img logo rounded-circle mb-5" style=""></a>
   
<ul class="list-unstyled components mb-5">
<li class="active">
  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Package</a>
  <ul class="collapse list-unstyled" id="homeSubmenu">
  <li>
      <a href="{{ route('createpackage')}}">Create Package</a>
  </li>
  <li>
    <a href="/employee/dashboard/viewpackagecatagory">Add Package Category</a>
</li>

  <li>
      <a href="{{ route('showpackage')}}">View Package</a>
  </li>
  <li>
      <a href="/employee/dashboard/booking">Booking Package </a>
  </li>
  </ul>
</li>
<li>
    <a href="/employee/dashboard/profile">My Profile</a>
</li>
<li>
<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customer</a>
<ul class="collapse list-unstyled" id="pageSubmenu">
  <li>
      <a href="/employee/dashboard/create">Create Customer</a>
  </li>
  <li>
      <a href="/employee/dashboard/view">Customer List</a>
  </li>




</ul>
</li>
<li>
    <a href="#TourGuide" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tour Guide</a>
    <ul class="collapse list-unstyled" id="TourGuide">
    <li>
        <a href="/employee/dashboard/createtourguide">Create Guide</a>
    </li>
    <li>
        <a href="/employee/dashboard/viewtourguide">View Guide</a>
    </li>
    
   
    </ul>
  </li>
<li>

    <li>
        <a href="#feedback" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Feedback</a>
        <ul class="collapse list-unstyled" id="feedback">
     
        <li>
            <a href="/employee/dashboard/viewfeedback">View Feedback</a>
        </li>
        <li>
            <a href="/employee/dashboard/viewfeedbackcatagory">Add Catagory</a>
        </li>
       
        </ul>
      </li>
    <li>
<a href="/employee/dashboard/viewbooking">Booking </a>
</li>
<li>
    <a href="{{ route('employee.blog.index') }}">Blog </a>
    </li>
</ul>





</div>
