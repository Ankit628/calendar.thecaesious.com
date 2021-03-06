<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{env('APP_URL').'favicon.png'}}"/>
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
    <script src="{{asset('backend/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/sw.js')}}" defer></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $(document).ready(function () {
                if ("serviceWorker" in navigator && "PushManager" in window) {
                    // Register a service worker hosted at the root of the
                    // site using the default scope.
                    navigator.serviceWorker.register('{{getServiceWorkerUrl()}}').then(function (registration) {
                        console.log('Service worker registered', registration);
                        initPush();
                    }, function (error) {
                        console.log('Service worker registration failed:', error);
                    });
                } else {
                    console.log('Service workers are not supported.');
                }
            });

            function initPush() {
                if (!navigator.serviceWorker.ready) {
                    return;
                }
                new Promise(function (resolve, reject) {
                    const permissionResult = Notification.requestPermission(function (result) {
                        resolve(result);
                    });
                    if (permissionResult) {
                        permissionResult.then(resolve, reject);
                    }
                }).then((permissionResult) => {
                    if (permissionResult !== 'granted') {
                        toastr.error('Notifications Turned Off');
                    }
                });
            }
        });
    </script>
@endguest
@include('backend._partials.scripts')
<script>
    @if(Session::has('success'))
    toastr.success('{{Session::get('success')}}');
    @endif
    @if(Session::has('warn'))
    toastr.warning('{{Session::get('warn')}}');
    @endif
    @if(Session::has('error'))
    toastr.error('{{Session::get('error')}}');
    @endif
    jQuery(function () {
        let nav = $('.navbar-nav.sidebar');
        let mobileMenu = $('.mobile-menu');
        let mobileSideBar = $('.mobile-sidebar');
        let logout = $('.btn-logout');
        $('.mobile-menu-close a').on('click', function () {
            nav.addClass('display-md-none');
            mobileSideBar.removeClass('bg-opacity');
        });
        mobileMenu.on('click', function () {
            nav.removeClass('display-md-none');
            mobileSideBar.addClass('bg-opacity');
        });
        $('body').on('click', function (e) {
            if (e.target === mobileSideBar[0]) {
                nav.addClass('display-md-none');
                mobileSideBar.removeClass('bg-opacity');
            }
        });
        logout.on('click', function () {
            mobileSideBar.removeClass('bg-opacity');
            nav.addClass('display-md-none');
        });
    });
</script>
@stack('scripts')
</body>

</html>
