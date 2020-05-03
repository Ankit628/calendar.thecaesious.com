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
    <script src="{{asset('/sw.js')}}" defer></script>
    <script type="text/javascript">
        initSW();

        function initSW() {
            if ("serviceWorker" in navigator && "PushManager" in window) {
                // Register a service worker hosted at the root of the
                // site using the default scope.
                navigator.serviceWorker.register('./sw.js', {scope: './'}).then(function (registration) {
                    initPush();
                }, function (error) {
                    console.log('Service worker registration failed:', error);
                });
            } else {
                console.log('Service workers are not supported.');
            }
        }

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
                    toastr.error('Error', 'Notification Disabled');
                } else {
                    subscribeUser();
                }
            });
        }


        function subscribeUser() {
            navigator.serviceWorker.ready.then((registration) => {
                const subscribeOptions = {
                    userVisibleOnly: true,
                    applicationServerKey: urlBase64ToUint8Array(
                        'BAk8OB7ZrX-8WI9pWHNzSIx5tq_7uA0f-7RhKtodMW5rD_jCeB-qTXiYDq5YS6srVxvHZMpQHlyf5_UJZU6QWLo'
                    )
                };
                return registration.pushManager.subscribe(subscribeOptions);
            }).then((pushSubscription) => {
                console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
                storePushSubscription(pushSubscription);
            });
        }

        function urlBase64ToUint8Array(base64String) {
            var padding = '='.repeat((4 - base64String.length % 4) % 4);
            var base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');

            var rawData = window.atob(base64);
            var outputArray = new Uint8Array(rawData.length);

            for (var i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function storePushSubscription(pushSubscription) {
            const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');

            fetch('{{route('admin.notification.store')}}', {
                method: 'POST',
                body: JSON.stringify(pushSubscription),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': token
                }
            }).then((res) => {
                return res.json();
            }).then((res) => {
                if (res.success === true)
                    toastr.success('Notification Enabled');
                console.log(res)
            }).catch((err) => {
                toastr.error('Error', 'Error Occured, check Console');
                console.log(err);
            });
        }
    </script>
@endguest
@include('backend._partials.scripts')
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
