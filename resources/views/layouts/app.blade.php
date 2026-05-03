{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}



<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT ctrl+d -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $adminCompany->name ?? config('app.name', 'News Portal') }} Admin</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/bundles/select2/dist/css/select2.min.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="icon" type="image/x-icon" href="{{ !empty($adminCompany?->logo) ? asset($adminCompany->logo) : asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ !empty($adminCompany?->logo) ? asset($adminCompany->logo) : asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ !empty($adminCompany?->logo) ? asset($adminCompany->logo) : asset('favicon.ico') }}">
    <style>
        .navbar-bg {
            background: linear-gradient(90deg, #0f172a 0%, #1e293b 55%, #334155 100%) !important;
        }
        .main-sidebar .sidebar-brand a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 16px;
            min-height: 84px;
            height: auto;
            white-space: normal;
            overflow: hidden;
            border-bottom: 1px solid #e5e7eb;
        }
        .main-sidebar .sidebar-brand .header-logo {
            width: 44px !important;
            height: 44px !important;
            object-fit: contain;
            flex-shrink: 0;
            float: none !important;
            margin: 0 !important;
            position: static !important;
            border-radius: 8px;
            background: #fff;
            padding: 2px;
        }
        .main-sidebar .sidebar-brand .brand-text-wrap {
            display: flex;
            flex-direction: column;
            min-width: 0;
            line-height: 1.2;
        }
        .main-sidebar .sidebar-brand .logo-name {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.04em;
            color: #0f172a;
            text-transform: uppercase;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .main-sidebar .sidebar-brand .brand-subtitle {
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #64748b;
            margin-top: 4px;
        }
        .main-sidebar .sidebar-menu li.active > a {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.15), rgba(37, 99, 235, 0.05));
            color: #1d4ed8 !important;
            font-weight: 700;
        }
        .admin-surface-card {
            border-radius: 14px;
        }
        .admin-stat-card {
            border-radius: 14px;
            color: #fff;
            overflow: hidden;
        }
        .admin-stat-card .card-body {
            padding: 22px;
        }
        .admin-stat-label {
            display: block;
            font-size: 0.85rem;
            opacity: 0.9;
        }
        .admin-stat-number {
            margin: 12px 0 8px;
            font-size: 1.9rem;
            font-weight: 800;
            color: #fff;
        }
        .admin-stat-meta {
            font-size: 0.8rem;
            opacity: 0.9;
        }
        .stat-card-blue {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        .stat-card-green {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
        }
        .stat-card-orange {
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
        }
        .stat-card-red {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }
        .admin-quick-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.85rem 1rem;
            margin-bottom: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            color: #1e293b;
            transition: all 0.2s ease;
            font-weight: 600;
        }
        .admin-quick-link:hover {
            text-decoration: none;
            border-color: #cbd5e1;
            transform: translateY(-1px);
            background-color: #f8fafc;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <i data-feather="settings"></i>
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            {{-- <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a> --}}
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item has-icon text-danger d-flex align-items-center">Logout <i
                                        class="fas fa-sign-out-alt ml-1"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <x-admin-sidebar />
            </div>
            <!-- Main Content -->
            <div class="main-content">
                {{-- <ul>
                    <li>
                        <a href="">{{ Request::route()->getName() }}</a>
                    </li>
                </ul> --}}
                {{ $slot }}
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox"
                                            class="custom-switch-input" id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="#">{{ $adminCompany->name ?? config('app.name', 'News Portal') }} Admin</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
