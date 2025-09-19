<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?=site_url()?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets1/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets1/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets1/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets1/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets1/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets1/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets1/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets1/plugins/summernote/summernote-bs4.min.css">
  <!-- <link rel="stylesheet" href="assets1/plugins/toastr/toastr.min.css">
  <link href="assets1/toastr.css" rel="stylesheet" type="text/css" /> -->
    <link href="assets1/toastr.min.css" rel="stylesheet">
    <link href='assets1/jquery-ui.css' rel='stylesheet'> 
    <link rel="stylesheet" href="assets1/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets1/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets1/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href='assets1/sweetalert2.min.css' rel='stylesheet'> 
    <link href='assets1/loader.css' rel='stylesheet'> 
</head>
<?php 

        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $permission_id = $session->get('id');


 ?>
<body class="hold-transition sidebar-mini layout-fixed "> 
    <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center" style="opacity:.7;">
        <img class="animation__shake" src="assets/images/white-logo.png" alt="WEETEK Soft" height="80" width="140">
    </div> -->

    <!-- <div id="cover-spin" class="loading" style="display:none !important;"></div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <!-- <a href="#" class="nav-link"> LOCATION :  </a>                -->
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item d-none">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown d-none">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="assets1/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="assets1/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="assets1/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown d-none">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item d-none">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=site_url('/logout')?>" class="nav-link">Logout</a>
            </li>
            <li class="nav-item d-none">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-cog"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?=site_url('/dashboard')?>" class="brand-link">
            <!-- <img src="assets/images/white-logo.png" alt="btsoft " class="brand-image elevation-3" style="opacity: .7"> -->
            <span class="brand-text">CGC</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 mb-1 d-flex">
            <div class="image">
            <!-- <img src="assets1/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
            <a href="<?=site_url('/dashboard')?>" class="d-block"> Admin </a>
            </div>
        </div> 

        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?=site_url('/dashboard')?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard 
                    </p>
                    </a> 
                </li>   
                <li class="nav-item">
                    <a href="<?=site_url('Admin/memberlist')?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Member List 
                    </p>
                    </a> 
                </li> 

                <li class="nav-item d-none">
                    <a href="<?=site_url('Admin/feedbacklist')?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Feedback List 
                    </p>
                    </a> 
                </li> 

                <li class="nav-item d-none">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Enquery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a  href="<?=site_url('Admin/enquerylist')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enquery List</p>
                            </a> 
                        </li>
                    </ul>
                </li>    
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

<!-- jQuery -->
    <script src="assets1/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="assets1/plugins/jquery-ui/jquery-ui.min.js"></script> 
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="assets1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="assets1/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="assets1/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="assets1/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets1/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assets1/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="assets1/plugins/moment/moment.min.js"></script>
    <script src="assets1/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="assets1/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="assets1/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets1/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets1/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets1/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets1/dist/js/pages/dashboard.js"></script> 
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script src="assets1/plugins/select2/js/select2.js"></script>
 
    <script src="assets1/sstoast.js"></script>
    <script src="assets1/maskinput.js"></script>
    <script src="assets1/jquery-ui.js"></script> 
    <script src="assets1/tabnext.js"></script>

    <script src="assets1/sweetalert2.all.min.js"></script>

    <script src="assets1/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets1/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets1/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets1/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets1/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets1/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets1/plugins/jszip/jszip.min.js"></script>
    <script src="assets1/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets1/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets1/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets1/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets1/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <style type="text/css">
        .ui-datepicker-calendar th {
             background-color: #1d3c6e !important; color: #ffffff !important;
        }
        .ui-datepicker {
            width: 15em !important;
        }
        .ui-datepicker td span, .ui-datepicker td a { text-align: center !important; }
        .buttons-html5{ background-color : #17a2b8; padding: 0.3rem 0.45rem !important; }
        .buttons-pdf{ background-color : #17a2b8;padding: 0.3rem 0.45rem !important;  }
        .buttons-print{ background-color : #17a2b8;padding: 0.3rem 0.45rem !important;  }
        .buttons-colvis{ background-color : #17a2b8;padding: 0.3rem 0.45rem !important;  }

        .table td, .table th { font-size: 12px !important; padding: 0.25rem !important; };
        .form-control { 
                padding: 0.375rem 0.45rem !important;
            }

        li > div { font-size:12px !important; }
        label { font-size:12px !important; margin-bottom: 0rem }
        .input-group-text {
            padding: 0.175rem 0.5rem; 
            font-size: .85rem;
        }
        .card-title {
            font-size: 1rem;
        }
        .error { font-size: 13px; }

        .form-control:focus {
            background-color: #FFFACD;
            outline: 1 !important; 
        }

        .edit{  background-color: #FFFACD;  } 

        .swal2-popup {
            font-size: .8rem;
        }         
        .ui-autocomplete {
            max-height: 350px;
            overflow-y: auto;   /* prevent horizontal scrollbar */
            overflow-x: hidden; /* add padding to account for vertical scrollbar */
            z-index:1000 !important;
        }
        /*  body{
            font-family: "Gill Sans", sans-serif;
        }*/         

    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.cdate,#d_from,#dfrom,#txt_from,#txt_to,#from,.lrdate').datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: false,
                changeYear: false,
                //showButtonPanel: true,
                autoclose: true,
                startDate: '-3d'
            });
        });
    </script>