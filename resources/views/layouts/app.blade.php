<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>{{ GetSettings('site_name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}{{ GetSettings('logo_small') }}" type="image/x-icon" />
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('dist/css/customize.css') }}">

</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-mini @yield('body_class')">

    @if (
        !request()->is('login') &&
            !request()->is('register') &&
            !request()->is('forgot-password') &&
            !request()->is('reset-password/*') &&
            !request()->is('admin/login') &&
            !request()->is('admin/register'))
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- Navbar -->
            <nav id="nav" class="fixed main-header navbar navbar-expand">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ GetSettings('dashboard_url') }}{{ Auth::guard('admin')->user() ? '/admin' : '' }}"
                            class="nav-link">
                            @if (Auth::guard('admin')->user())
                                Admin Dashboard
                            @else
                                Dashboard
                            @endif
                        </a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                    @if (Auth::guard('admin')->user())
                        <!-- Login History Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa-solid fa-users"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                {{ userLoginHistory() }}
                            </div>
                        </li>

                        <!-- User Log Activity Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                {{ userLogActivity() }}
                                <div class="dropdown-divider"></div>
                                <a href="/admin/log-activity/user" class="dropdown-item dropdown-footer">See All User
                                    Activity</a>
                            </div>
                        </li>

                        <!-- Notifications Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell"></i>
                                @if (countLedgerPendingRequest() >= 1)
                                    <span
                                        class="badge badge-warning navbar-badge">{{ countLedgerPendingRequest() }}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">{{ countLedgerPendingRequest() }} Pending
                                    Request</span>
                                <div class="dropdown-divider"></div>

                                {{ LedgerPendingRequest() }}


                                <a href="/admin/transactions/account-ledger" class="dropdown-item dropdown-footer">See
                                    All Ledger Transactions</a>
                            </div>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" role="button">
                            <i class="fa-solid fa-expand"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                            role="button">
                            <i class="fa-solid fa-window-restore"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->


            {{-- Sidebar --}}
            @if (request()->is('admin') || request()->is('admin/*'))
                @include('layouts.admin-sidebar')
            @else
                @include('layouts.sidebar')
            @endif
            {{-- Sidebar --}}


            {{-- Content --}}
            @yield('content')
            {{-- Content --}}


            {{-- Footer --}}
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 2.0
                </div>
                <strong>
                    Copyright &copy; {{ now()->year }}
                    <a href="{{ GetSettings('site_url') }}" class="text-theme" target="_blank">
                        {{ GetSettings('site_name') }}
                    </a>.
                </strong> All rights reserved.
            </footer>
            {{-- Footer --}}


            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark"></aside>
            <!-- /.control-sidebar -->

        </div>
        <!-- ./wrapper -->
    @else
        {{-- Content --}}
        @yield('content')
        {{-- Content --}}
    @endif

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @if (Session::has('message') || Session::has('error') || Session::has('info') || Session::has('warning'))
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
            // do not auto format code
            toastr.options = {
                "closeButton": {{ GetSettings('toastr_notification_close_button') }},
                "positionClass": "toast-{{ GetSettings('toastr_notification_position_class') }}",
                "newestOnTop": true,
                "timeOut": "{{ GetSettings('toastr_notification_time_out') }}",
                "progressBar": {{ GetSettings('toastr_notification_progress_bar') }},
            }
        </script>
    @endif
    @if (Session::has('message'))
        <script>
            toastr.success("{{ session('message')['text'] }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ session('error')['text'] }}");
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.info("{{ session('info')['text'] }}");
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            toastr.warning("{{ session('warning')['text'] }}");
        </script>
    @endif
    @yield('scripts')
    <script src="{{ asset('dist/js/theme-setting.js') }}"></script>
    <script src="{{ asset('dist/js/customize.js') }}"></script>
</body>

</html>
