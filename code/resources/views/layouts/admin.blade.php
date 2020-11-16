<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link">
            <span class="brand-text font-weight-light">Airline Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
            <div class="os-padding">
                <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid" style="overflow-y: scroll;">
                    <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                                     with font-awesome or any other icon font library -->
                                <li class="nav-item has-treeview menu-open">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="./index.html" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Dashboard v1</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./index2.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Dashboard v2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./index3.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Dashboard v3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/widgets.html" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Widgets
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            Layout Options
                                            <i class="fas fa-angle-left right"></i>
                                            <span class="badge badge-info right">6</span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/layout/top-nav.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Top Navigation</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Top Navigation + Sidebar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/boxed.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Boxed</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fixed Sidebar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fixed Navbar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Fixed Footer</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Collapsed Sidebar</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Charts
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/charts/chartjs.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>ChartJS</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/flot.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Flot</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/charts/inline.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Inline</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tree"></i>
                                        <p>
                                            UI Elements
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/UI/general.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>General</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/icons.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Icons</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/buttons.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Buttons</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/sliders.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Sliders</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/modals.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Modals &amp; Alerts</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/navbar.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Navbar &amp; Tabs</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/timeline.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Timeline</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/UI/ribbons.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ribbons</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Forms
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/forms/general.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>General Elements</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/advanced.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Advanced Elements</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/editors.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Editors</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/forms/validation.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Validation</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-table"></i>
                                        <p>
                                            Tables
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/tables/simple.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Simple Tables</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/data.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>DataTables</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>jsGrid</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">EXAMPLES</li>
                                <li class="nav-item">
                                    <a href="pages/calendar.html" class="nav-link">
                                        <i class="nav-icon far fa-calendar-alt"></i>
                                        <p>
                                            Calendar
                                            <span class="badge badge-info right">2</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/gallery.html" class="nav-link">
                                        <i class="nav-icon far fa-image"></i>
                                        <p>
                                            Gallery
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-envelope"></i>
                                        <p>
                                            Mailbox
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Inbox</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/mailbox/compose.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Compose</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Read</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Pages
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/examples/invoice.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Invoice</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/profile.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Profile</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/e-commerce.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>E-commerce</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/projects.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Projects</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/project-add.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Project Add</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/project-edit.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Project Edit</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/project-detail.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Project Detail</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/contacts.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Contacts</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        <p>
                                            Extras
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="pages/examples/login.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Login</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/register.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Register</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/forgot-password.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Forgot Password</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/recover-password.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Recover Password</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Lockscreen</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Legacy User Menu</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/language-menu.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Language Menu</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/404.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Error 404</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/500.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Error 500</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/pace.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Pace</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages/examples/blank.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Blank Page</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="starter.html" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Starter Page</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header">MISCELLANEOUS</li>
                                <li class="nav-item">
                                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                                        <i class="nav-icon fas fa-file"></i>
                                        <p>Documentation</p>
                                    </a>
                                </li>
                                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Level 1</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>
                                            Level 1
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Level 2</p>
                                            </a>
                                        </li>
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    Level 2
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Level 3</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Level 3</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Level 3</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Level 2</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Level 1</p>
                                    </a>
                                </li>
                                <li class="nav-header">LABELS</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-danger"></i>
                                        <p class="text">Important</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p>Warning</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>Informational</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 81.3196%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright © 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3 control-sidebar-content"><h5>Customize AdminLTE</h5><hr class="mb-2"><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>No Navbar border</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Footer small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav flat style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav legacy style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav compact</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav child indent</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Main Sidebar disable hover/focus auto expand</span></div><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Brand small text</span></div><h6>Navbar Variants</h6><div class="d-flex"><div class="d-flex flex-wrap mb-3"><div class="bg-primary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-secondary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-info elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-success elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-indigo elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-purple elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-pink elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-navy elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lightblue elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-teal elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-cyan elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-dark elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-gray-dark elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-gray elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-light elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-warning elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-white elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-orange elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div></div></div><h6>Accent Color Variants</h6><div class="d-flex"></div><div class="d-flex flex-wrap mb-3"><div class="bg-primary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-warning elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-info elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-success elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-indigo elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lightblue elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-navy elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-purple elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-fuchsia elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-pink elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-maroon elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-orange elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lime elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-teal elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-olive elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div></div><h6>Dark Sidebar Variants</h6><div class="d-flex"></div><div class="d-flex flex-wrap mb-3"><div class="bg-primary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-warning elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-info elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-success elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-indigo elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lightblue elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-navy elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-purple elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-fuchsia elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-pink elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-maroon elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-orange elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lime elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-teal elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-olive elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div></div><h6>Light Sidebar Variants</h6><div class="d-flex"></div><div class="d-flex flex-wrap mb-3"><div class="bg-primary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-warning elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-info elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-success elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-indigo elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lightblue elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-navy elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-purple elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-fuchsia elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-pink elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-maroon elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-orange elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lime elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-teal elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-olive elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div></div><h6>Brand Logo Variants</h6><div class="d-flex"></div><div class="d-flex flex-wrap mb-3"><div class="bg-primary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-secondary elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-info elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-success elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-danger elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-indigo elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-purple elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-pink elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-navy elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-lightblue elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-teal elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-cyan elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-dark elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-gray-dark elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-gray elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-light elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-warning elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-white elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><div class="bg-orange elevation-2" style="width: 40px; height: 20px; border-radius: 25px; margin-right: 10px; margin-bottom: 10px; opacity: 0.8; cursor: pointer;"></div><a href="javascript:void(0)">clear</a></div></div></aside>
    <!-- /.control-sidebar -->
    <div id="sidebar-overlay">

    </div>
</div>
</body>
</html>
