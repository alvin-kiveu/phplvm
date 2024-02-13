<?php
//CHECK IF USER IS LOGGED IN
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP LVM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Employee Management System is a web application developed for the purpose of managing and scheduling employees.">
    <meta name="keywords" content="Employee Management System" />
    <meta name="author" content="Alvin Kiveu">
    <link rel="icon" href="/dist/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/dist/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dist/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/dist/assets/icon/feather/css/feather.css">
    <link rel="stylesheet" type="text/css" href="/dist/assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" href="/dist/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/dist/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/dist/assets/css/widget.css">
    <link rel="stylesheet" type="text/css" href="/dist/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="/dist/bower_components/animate.css/css/animate.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="/dashboard">
                            <div class="img-fluid text-center text-white text-bold">
                                PHP LVM
                            </div>
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="/dist/assets/images/user.png" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span>
                                            <?php
                                            //GET USER NAME
                                            echo 'Welcome,' . ' ';
                                            //check if user is logged in
                                            $username = session()->get('username');
                                            echo $username;
                                            ?>
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/auth/logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>




            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">Navigation</div>
                                <ul class="pcoded-item pcoded-left-item">

                                    <li class="active pcoded-trigger">
                                        <a href="/dashboard" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="vpn" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-shield"></i>
                                            </span>
                                            <span class="pcoded-mtext">VPN</span>
                                        </a>
                                    </li>

                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">PPTP Management</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="addppptp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add PPTP Client</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="viewppptp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">View PPTP User</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    {{-- <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">L2TP Management</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="addl2tp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add L2TP Client</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="viewl2tp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">View L2TP User</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">OpenVPN Management</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="addopenvpn" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add OpenVPN Client</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="viewopenvpn" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">View OpenVPN User</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">SSTP Management</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="addsstp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add SSTP CLIENT</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="viewsstp" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">View SSTP User</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
 --}}


                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">User Management</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class>
                                                <a href="/role/add" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add Role</span>
                                                </a>
                                            </li>
                                            <li class>
                                                <a href="/role/list" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Roles
                                                </a>
                                            </li>
                                            <li class>
                                                <a href="/user/add" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Add User</span>
                                                </a>
                                            </li>
                                            <li class>
                                                <a href="/user/list" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">View Users</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class>
                                        <a href="/auth/logout" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-log-out"></i>
                                            </span>
                                            <span class="pcoded-mtext">Logout</span>
                                        </a>
                                    </li>
                                </ul>




                            </div>
                        </div>
                    </nav>

                    <div class="pcoded-content">

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
