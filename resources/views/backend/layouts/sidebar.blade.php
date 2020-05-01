<div class="mobile-menu">
    <button class="btn btn-lg btn-light text-dark">
        <span class="fa fa-bars"></span>
    </button>
</div>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark display-md-none">
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
            <i class="fa fa-calendar text-lg"></i>
            <span>Calendar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.event.index')}}">
            <i class="fa fa-bell text-lg"></i>
            <span>Events</span>
        </a>
    </li>
@if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
    <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.user.index')}}">
                <i class="fas fa-fw fa-user-circle text-lg"></i>
                <span>Users</span>
            </a>
        </li>
@endif
<!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt text-lg"></i>
            <span>Logout ({{Auth::user()->name}})</span>
        </a>
    </li>

    <div class="mobile-menu-close">
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <div class="nav-item">
            <a class="nav-link" href="javascript:void(0)">
                <i class="fa fa-arrow-circle-right text-white text-lg"></i>
            </a>
        </div>
    </div>

</ul>
