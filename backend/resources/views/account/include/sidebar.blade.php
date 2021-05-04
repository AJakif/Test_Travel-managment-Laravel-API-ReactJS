<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/account/dashboard" class="brand-link">
      <img src="{{URL::to('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Account</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/upload/user_image')}}/{{ $LoggedUserInfo->profile_img}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('account.profile')}}" class="d-block">{{ $LoggedUserInfo['username'] }}</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!-- Profile Menu -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/account/dashboard/editprofile/{{ $LoggedUserInfo['id'] }}" class="nav-link ">
                  <i class="fas fa-user-edit"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('auth.logout') }}" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Blog Menu -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.create.blog') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.blog.tag') }}" class="nav-link ">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Blog Tag</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.blog.cat') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('account.comment')}}" class="nav-link">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Comments</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Coupon Menu -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-percent"></i>
              <p>
                Coupon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('coupon.index')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Coupons </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('coupon.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Create Coupon</p>
                </a>
              </li>
            </ul>
          </li>
          
           <!-- Employee management -->
          <li class="nav-header">Employee Management</li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
               Employee
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('account.employee') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
               Salary
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.salary.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
               Employee Activity 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.attendance') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.leave') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Leave</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
               Payroll
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.monthlysalary') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Salary</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.salary.pay') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pay Monthly Salary</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.employee.salary.view') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Salary Log</p>
                </a>
              </li>              
            </ul>
            <li class="nav-item">
                <a href="{{ route('account.extracost') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Extra Cost</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('account.order') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li> 

            <li class="nav-header">Reports</li>
            <li class="nav-item">
                <a href="{{ route('account.MonthlyProfit.show') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Profit</p>
                </a>
              </li> 
                         
            
            
          </li>
          <li class="nav-header">Website</li>
          <li class="nav-item">
            <a href="{{route('settings')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
            
          <li class="nav-header">MISCELLANEOUS</li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>