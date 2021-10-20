@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();


@endphp

<aside class="main-sidebar">
<!-- sidebar-->
<section class="sidebar">

    <div class="user-profile">
        <div class="ulogo">
             <a href="index.html">
              <!-- logo for regular state and mobile devices -->
                 <div class="d-flex align-items-center justify-content-center">
                      <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                      <h3><b>Magnus</b></h3>
                 </div>
            </a>
        </div>
    </div>

  <!-- sidebar menu-->
  <ul class="sidebar-menu" data-widget="tree">

    <li class=" {{ ($route == 'dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}">
        <i data-feather="pie-chart"></i>
        <span>Dashboard</span>
      </a>
    </li>
    @if(Auth::user()->role == 'Admin')
    <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
      <a href="#">
        <i data-feather="message-circle"></i>
        <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>Show users</a></li>
        {{-- <li><a href="{{ route('user.new') }}"><i class="ti-more"></i>Add user</a></li> --}}
      </ul>
    </li>
    @endif

    <li class="treeview {{ ($prefix == '/setup') ? 'active' : '' }}">
      <a href="#">
        <i data-feather="file"></i>
        <span>Setup</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
        <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
        <li><a href="{{ route('subject.view') }}"><i class="ti-more"></i>Subject</a></li>
        <li><a href="{{ route('shift.view') }}"><i class="ti-more"></i>Shift</a></li>
        <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee category</a></li>
        <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee category Amount</a></li>
        <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam type</a></li>
        <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
        <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
        <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation</a></li>
      </ul>
    </li>

    <li class="treeview {{ ($prefix == '/students') ? 'active' : '' }}">
      <a href="#">
        <i data-feather="file"></i>
        <span>Students</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>
        <li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll generation</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i data-feather="grid"></i>
        <span>Components</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
        <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
      </ul>
    </li>

    <li>
      <a href="{{ route('admin.logout') }}">
        <i data-feather="lock"></i>
        <span>Log Out</span>
      </a>
    </li>

  </ul>
</section>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>
</aside>
