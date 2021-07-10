<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resturant Application</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="{{ asset('adminlte/dist/img/icon.png') }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
    @if( app()->getLocale() == 'en' )
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

        <style>
      *
      {
        font-family: 'Poppins', sans-serif;
      }

      .skin-blue .sidebar-menu>li>a
      {
        transition : .3s
      }



      .skin-blue .sidebar-menu>li.active>a,
      .skin-blue .sidebar-menu>li.menu-open>a
      {
        background-color : #3c8dbc;
        color : #fff !important
      }


  </style>


    @else



        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/rtl.css') }}">




        <style>

        @font-face {
            src: url("{{ asset('fonts/Sukar-Regular.otf') }}");
            font-family: Sukar;
        }

      a , th , label ,div , p , span , b , h1 , h2 , h3 , h4 , h5 , h6 , ul , li > a , a.dropdown-toggle
      {
        font-family: Sukar !important;
      }

      .skin-blue .sidebar-menu>li>a
      {
        transition : .3s;
        font-size : 15px
      }



      .skin-blue .sidebar-menu>li.active>a,
      .skin-blue .sidebar-menu>li.menu-open>a
      {
        background-color : #3c8dbc;
        color : #fff !important
      }

      .user-panel .pull-left.image
      {
        float: right !important;
      }


  </style>


    @endif
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">







  <style>
      *
      {
        font-family: 'Poppins', sans-serif;
      }

      .skin-blue .sidebar-menu>li>a
      {
        transition : .3s
      }


      .skin-blue .sidebar-menu>li.active>a,
      .skin-blue .sidebar-menu>li.menu-open>a
      {
        background-color : #3c8dbc;
        color : #fff !important
      }

      div.dataTables_wrapper div.dataTables_filter input
      {
        margin-left: 0.5em;
        display: inline-block;
        width: 450px;
      }


      .user-panel>.image>img
      {
      	width: 100%;
      	height: 45px
      }


  </style>

  <!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.includes.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        @yield('content')
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.includes.footer')


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->





<!-- Plugins -->
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/jquery.countTo.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>

<!-- Main Script -->
<script src="{{ asset('js/main.js')}}"></script>

@stack('scripts')

</body>
</html>
