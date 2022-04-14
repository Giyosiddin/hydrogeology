<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="shortcut icon" href="/front/images/favicon_new.ico" type="image/png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/admin-assets/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/admin-assets/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

  {{-- <link rel="stylesheet" href="asset('/admin-assets/select2/css/select2.min.css')"> --}}
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('/admin-assets/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin-assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin-assets/custom.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Site</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> -->
                <!-- <span class="hidden-xs">{{ucfirst (Auth::user()->name) }} </span> -->
                 <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="/admin-assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    {{ ucfirst(Auth::user()->name) }}

                    </h3>
                    <p class="text-sm"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" class="float-right text-sm text-danger"><i class="fas fa-sign-out-alt"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></p>
                    {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> --}}
                  </div>
                </div>
                <!-- Message End -->
              </div>
              <div class="dropdown-divider"></div>

            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->
@include('admin.components.sidebar')

 @yield('content')


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin-assets/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin-assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/admin-assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('/admin-assets/dist/js/adminlte.js')}}"></script>
{{-- <script src="asset('/admin-assets/select2/js/select2.full.min.js')"></script> --}}
<!-- PAGE PLUGINS -->

<!-- dropzonejs -->
<script src="{{asset('/admin-assets/dropzone/min/dropzone.min.js')}}"></script>
<!-- jQuery Mapael -->
<!-- <script src="/admin/jquery-mapael/maps/usa_states.min.js"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin-assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/admin-assets/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('/admin-assets/custom.js')}}"></script>
</body>
</html>
