<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin | Dashboard</title>

    <meta content="Ours" name="author" />
    <meta content="RAST" name="company" />
    <meta content="RAST" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('fav.jpg') }}" type="image/png">
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css">
    {{--  <!-- Berlin Font --> --}}
    {{--  <link href="http://fonts.cdnfonts.com/css/berlin-sans-fb-demi" rel="stylesheet"> --}}
    {{--  <!-- Berlin End --> --}}

    <style>
        body {
            font-size: 14px;
        }

        label {
            font-size: 12px;
        }

        .form-control {
            font-size: 14px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    @yield('stylesheet')
</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center" style="padding-right: 35px">
                    <a href="{{ route('home') }}" class="logo">
                        <img style="background: whitesmoke;display: unset"
                            src="{{ asset('assets/site/images/logo/logo.png') }}" height="50" alt="logo"></a>
                </div>
            </div>
            <div class="sidebar-inner slimscrollleft">
                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="waves-effect"><i
                                    class="mdi mdi-view-dashboard"></i> <span> Dashboard</span>
                            </a>
                        </li>
                        {{--          @if (\App\Helper\CustomHelper::canView('Manage Logo', 'Super Admin')) --}}
                        {{--          <li><a href="{{ route('site.logo') }}" class="waves-effect"><i class="mdi mdi-image-album"></i> <span>{{__('layout.site_logo')}}</span> --}}
                        {{--            </a></li> --}}
                        {{--          @endif --}}

                        <li class="has_sub">
                            <a class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Orders <span
                                        class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('order.list') }}">List of Order</a></li>
                            </ul>
                        </li>
                        @if (\App\Helper\CustomHelper::canView('Create User|Manage User|Delete User|View User|List Of User', 'Super Admin'))
                            <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Users <span
                                            class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    @if (\App\Helper\CustomHelper::canView('Create User', 'Super Admin'))
                                        <li><a href="{{ route('user.create') }}">Create User</a></li>
                                    @endif
                                    @if (\App\Helper\CustomHelper::canView('Manage User|Delete User|View User|List Of User', 'Super Admin'))
                                        <li><a href="{{ route('user.list') }}">List of User</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (\App\Helper\CustomHelper::canView('Create Role|Manage Role|Delete Role|View Role|List Of Role', 'Super Admin'))
                            <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-lock-open"></i><span> Roles <span
                                            class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    @if (\App\Helper\CustomHelper::canView('Create Role', 'Super Admin'))
                                        <li><a href="{{ route('role.create') }}">Create Role</a></li>
                                    @endif
                                    @if (\App\Helper\CustomHelper::canView('Manage Role|Delete Role|View Role|List Of Role', 'Super Admin'))
                                        <li><a href="{{ route('role.list') }}">List of Role</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (\App\Helper\CustomHelper::canView('Manage Permission', 'Super Admin'))
                            <li><a href="{{ route('permission.manage') }}" class="waves-effect">
                                    <i class="mdi mdi-block-helper"></i>
                                    <span> Permission</span>
                                </a></li>
                        @endif



                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Category|Manage Category|Delete Category|View Category|List Of Category',
                                'Super Admin'))
                            <li><a href="{{ route('category.list') }}" class="waves-effect">
                                    <i class="mdi mdi-image-album"></i>
                                    <span> Categories</span>
                                </a></li>
                        @endif


                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Category|Manage Category|Delete Category|View Category|List Of Category',
                                'Super Admin'))
                            <li><a href="{{ route('subcategory.list') }}" class="waves-effect">
                                    <i class="mdi mdi-certificate"></i>
                                    <span> Sub Categories</span>
                                </a></li>
                        @endif

                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Category|Manage Category|Delete Category|View Category|List Of Category',
                                'Super Admin'))
                            <li><a href="{{ route('slider.list') }}" class="waves-effect">
                                    <i class="mdi mdi-image-album"></i>
                                    <span> Slider</span>
                                </a></li>
                        @endif


                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Category|Manage Category|Delete Category|View Category|List Of Category',
                                'Super Admin'))
                            <li><a href="{{ route('pickuppoint.list') }}" class="waves-effect">
                                    <i class="mdi mdi-recycle"></i>
                                    <span>Pickup Point</span>
                                </a></li>
                        @endif



                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Animal|Manage Animal|Delete Animal|View Animal|List Of Animal',
                                'Super Admin'))
                            <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-cat"></i><span>Animal<span
                                            class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    @if (\App\Helper\CustomHelper::canView('Create Animal', 'Super Admin'))
                                        <li><a href="{{ route('animal.create') }}">Create Animal</a></li>
                                    @endif
                                    @if (\App\Helper\CustomHelper::canView('Manage Animal|Delete Animal|View Animal|List Of Animal', 'Super Admin'))
                                        <li><a href="{{ route('animal.list') }}">List of Animal</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Setting|Manage Setting|Delete Setting|View Setting|List Of Setting',
                                'Super Admin'))
                            <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-settings"></i><span>Setting<span
                                            class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    @if (\App\Helper\CustomHelper::canView('Create Setting', 'Super Admin'))
                                        <li><a href="{{ route('setting.create') }}">Create Setting</a></li>
                                    @endif
                                    @if (\App\Helper\CustomHelper::canView('Manage Setting|Delete Setting|View Setting|List Of Setting', 'Super Admin'))
                                        <li><a href="{{ route('setting.list') }}">List of Setting</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        {{--  @if (
                            \App\Helper\CustomHelper::canView(
                                'Create Food|Manage Food|Delete Food|View Food|List Of Food',
                                'Super Admin'))
                            <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-account-multiple"></i><span>Food<span
                                            class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    @if (\App\Helper\CustomHelper::canView('Create Food', 'Super Admin'))
                                        <li><a href="{{ route('food.create_store') }}">Create Food</a></li>
                                    @endif
                                    @if (\App\Helper\CustomHelper::canView('Manage Animal|Delete Animal|View Animal|List Of Animal', 'Super Admin'))
                                        <li><a href="{{ route('food.list') }}">List of Food</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif  --}}

                        @if (
                            \App\Helper\CustomHelper::canView(
                                'Create SiteReview|Manage SiteReview|Delete SiteReview|View SiteReview|List Of SiteReview',
                                'Super Admin|Customer'))
                            <li><a href="{{ route('sitereview.list') }}" class="waves-effect">
                                    <i class="mdi mdi-image-album"></i>
                                    <span> Review</span>
                                </a></li>
                        @endif






                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">
                        <!-- Search input -->
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input" type="search" placeholder="Search" />
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle"></i>
                                </a>
                            </div>
                        </div>

                        <ul class="float-right mb-0 list-inline">
                            <!-- Fullscreen -->
                            <li class="list-inline-item dropdown notification-list hidden-xs-down">
                                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                    <i class="mdi mdi-fullscreen noti-icon"></i>
                                </a>
                            </li>
                            {{--            <li class="list-inline-item dropdown notification-list hidden-xs-down"> --}}
                            {{--              @if (\Illuminate\Support\Facades\App::currentLocale() === 'bn') --}}
                            {{--                <a class="nav-link arrow-none waves-effect text-muted" href="{{ route('change.language', 'en') }}" --}}
                            {{--                ><span class="text-gray-800">English</span></a> --}}
                            {{--              @else --}}
                            {{--                <a class="nav-link arrow-none waves-effect text-muted" href="{{ route('change.language', 'bn') }}" --}}
                            {{--                ><span class="text-gray-800">বাংলা</span></a> --}}
                            {{--              @endif --}}
                            {{--            </li> --}}
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user"
                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <img src="{{ auth()->user()->profile_photo_url }}" alt="user"
                                        class="object-cover w-8 h-8 rounded-full">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i
                                            class="dripicons-user text-muted"></i>
                                        Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"><i
                                            class="dripicons-exit text-muted"></i>
                                        Logout</a>
                                </div>
                            </li>
                        </ul>
                        <!-- Page title -->
                        <ul class="mb-0 list-inline menu-left">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                            <li class="hide-phone list-inline-item app-search">
                                <h3 class="page-title">Dashboard</h3>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </nav>
                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper">
                    @yield('content')
                </div> <!-- Page content Wrapper -->
            </div>
            <footer class="footer">
                © 2023 {{ env('APP_NAME') }}
                <span class="text-muted hidden-xs-down pull-right">Developed & Maintained by <a href=""
                        target="_blank">OURS</a></span>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/admin/js/waves.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}


    <!-- App js -->
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    {{-- @include('sweetalert::alert') --}}
    @livewireScripts


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        })
    </script>
    @yield('script')
</body>

</html>
