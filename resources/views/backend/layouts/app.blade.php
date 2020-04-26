<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Calendar App | The Caesious | Site</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/vendor/flatpicker/dark.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendor/full-calendar/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendor/full-calendar/daygrid/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendor/full-calendar/bootstrap/main.css')}}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendor/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/css/custom.css')}}" rel="stylesheet">
</head>

<body id="page-top" @guest class="bg-gradient-primary" @endguest>

@guest
    <div class="container">
        <div class="row justify-content-center">
            <div class="absolute-center col-md-7">
                @include('backend._partials.errors.error-lists')
                @yield('content')
            </div>
        </div>
    </div>
@else
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
    @include('backend.layouts.sidebar')
    <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <header class="bg-light p-3 card row border-0">
                <div class="col-lg-12 col-md-12 col-sm-12 card-header text-dark border-0">
                    @yield('page-header')
                </div>
            </header>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('backend._partials.errors.error-lists')
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
        @include('backend.layouts.footer')
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endguest
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" data-toggle="modal"
                   data-target="#logoutModal" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@include('backend._partials.scripts')
@stack('scripts')
<script>
    @if(Session::has('success'))
    toastr.success('Success', '{{Session::get('success')}}');
    @endif
    @if(Session::has('warn'))
    toastr.warning('Warning', '{{Session::get('warn')}}');
    @endif
    @if(Session::has('error'))
    toastr.error('Error', '{{Session::get('error')}}');
    @endif
</script>
</body>

</html>
