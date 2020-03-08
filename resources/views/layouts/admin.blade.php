
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>parc automobile</title>

    <!-- Bootstrap -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{asset('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">
  <!-- Google Font: Source Sans Pro -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('partials.navbar')
@include('partials.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')

  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->


@include('partials.footer')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>



</body>
</html>
