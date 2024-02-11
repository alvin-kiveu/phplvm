<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP LVN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="keywords" content="HTML5, CSS3, jQuery, Bootstrap, Admin Template, UIkit, Dashboard" />
    <meta name="author" content="colorlib" />
    <link rel="icon" href="/dist/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/dist/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/dist/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/dist/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" type="text/css" href="/dist/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="/dist/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="/dist/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/dist/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/dist/assets/css/pages.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body themebg-pattern="theme1">
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <form action="/auth/login" method="post" class="md-float-material form-material">
                        @csrf
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">PHP LINUX VPN MANAGER</h3>
                                    </div>
                                </div>
                                <p class="text-muted text-center p-b-5">Sign in with your regular account</p>
                                {{-- Error Handling --}}
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
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>
    <script type="text/javascript" src="/dist/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="/dist/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/dist/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="/dist/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script src="/dist/assets/pages/waves/js/waves.min.js"></script>
    <script type="text/javascript" src="/dist/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="/dist/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="/dist/bower_components/modernizr/js/css-scrollbars.js"></script>
    <script type="text/javascript" src="/dist/assets/js/common-pages.js"></script>
</body>

</html>
