<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title-page') | Douganobiru</title>
  <base href="{{asset("")}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link href="asset/fonts/google.css" rel="stylesheet">
  <!-- Theme style -->
    <link rel="icon" href="asset/images/favicon1.png" type="image/x-icon"/>
  <link rel="stylesheet" href="asset/adminlte/dist/css/adminlte.css">
  <link rel="stylesheet" href="asset/css/navbar.css?v=6">
  <link rel="stylesheet" href="asset/css/common.css?v=5">
  @yield('css')
  <!-- jQuery -->
  <script src="asset/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="asset/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  @yield('js')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('layout.menu-top')
  <!-- /.navbar -->
  @include('layout.menu-left')
  <div class="content-wrapper">
    <div class="sk-loading-full d-none">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

{{-- Toast bootstrap --}}
<div class="sk-toast">
  <div class="toast sk-toast-success" data-delay="1500">
    <div class="toast-body bg-success text-white text-center px-5 py-2">
      Success
    </div>
  </div>
</div>
<div class="sk-toast">
  <div class="toast sk-toast-error" data-delay="1500">
    <div class="toast-body bg-danger text-white text-center px-5 py-2">
      Error
    </div>
  </div>
</div>

<!-- Bootstrap 4 -->
<script src="asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="asset/adminlte/dist/js/pages/dashboard.js"></script>
<script src="asset/js/common.js?v=1"></script>
@yield('footer-js')
@if(session()->has('success'))
    <script>
        skAlert('success', '{{ session()->get('success') }}');
    </script>
@endif
@if ($errors->any())
    <script>
        skAlert('error', '{{$errors->first()}}');
    </script>
@endif

</body>
</html>
