<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resturant Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->

  <!-- Theme style -->

  @if( app()->getLocale() == 'en' )
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

        <style>
      *
      {
        font-family: 'Poppins', sans-serif;
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

      body
      {
        font-family: Sukar !important;
      }



  </style>


    @endif

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">

  <link rel="icon" href="{{ asset('adminlte/dist/img/icon.png') }}">


  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <style>


      body
      {
        padding-top:50px
      }

  </style>


</head>
<body class="hold-transition login-page">
<div class="">

      <div class="container">

      <div class="login-logo">
    <a href="#" style="font-weight:bold;color:#3c8dbc">{{ trans('backend.adminlogin') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body " style="max-width:400px;margin:auto;border-top:3px solid #3c8dbc">
    <p class="login-box-msg">

    <div class="myImage text-center">
        <img style="border-radius:50%" width="200px" height="200px" src="{{ asset('adminlte/dist/img/login.jpg') }}" alt="">
      </div>

    </p>



    <form action="{{ route('admin.login') }}" method="POST">

      {{ csrf_field() }}

      @include('admin.includes.messages')

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="{{ trans('backend.email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="{{ trans('backend.password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat"> <i class="fa fa-lock fa-lg fa-fw"></i>  {{ trans('backend.signin') }} </button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- <a href="#">I forgot my password</a><br> -->

  </div>
      </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
