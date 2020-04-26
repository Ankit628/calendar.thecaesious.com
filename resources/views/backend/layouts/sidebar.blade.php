<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-skyatlas"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TheCaesious <sub>Calendar App</sub></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.calendar.index')}}">
            <i class="fa fa-calendar" style="font-size:1.3rem;"></i>
            <span>Calendar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.event.index')}}">
            <i class="fa fa-bell"></i>
            <span>Events</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Logout ({{Auth::user()->name}})</span>
        </a>
    </li>
</ul>
