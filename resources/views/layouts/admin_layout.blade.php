<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Админ-панель - @yield('title')</title>
    <link rel="stylesheet" href="/admin/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css"></head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"><nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav"> <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
      <li class="nav-item d-none d-sm-inline-block"><a href="#" class="nav-link d-none ">Contact</a></li></ul></nav>
  <aside class="main-sidebar sidebar-light-primary"><a href="{{route('homeAdmin')}}" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">Админ-панель</span></a>
    <div class="sidebar"><div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"><i class="far fa-user-circle fa-2x"></i></div>
        <div class="info"> <a href="#" class="d-block">{{Auth::user()->firstname}}</a> </div></div><nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"><li class="nav-item">
            <a href="{{route('ap_index')}}" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Выйти из системы</p></a></li>
          <li class="nav-item"><a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i> <p>Главная страница</p></a></li>
            <li class="nav-item"><a href="{{route('color.index')}}" class="nav-link"> <p>Цвет</p></a></li>
            <li class="nav-item"><a href="{{route('catalog.index')}}" class="nav-link"><p>Каталог</p></a> </li> 
            <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link"><i class="nav-icon"></i><p>Изделия</p></a> </li> 
            <li class="nav-item"><a class="nav-link"><p>Заказы<i class="right fas fa-caret-down"></i></p></a><ul class="nav nav-treeview">
                    <li class="nav-item"><a href="{{route('order.index')}}" class="nav-link"><p>Все заказы</p></a></li>
                    <li class="nav-item"> <a href="{{ route('order.index',  'filter_OS_New') }}" class="nav-link"><p>Текущие заказы</p></a> </li>
                    <li class="nav-item"><a href="{{ route('order.index', 'filter_OS_Arhiv') }}" class="nav-link"><p>Завершенные</p></a> </li> </ul></li> </ul></nav></div></aside>
  <div class="content-wrapper"> @yield('content')</div>
  <footer class="main-footer"><strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.<div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.1.0-rc</div></footer></div>
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/admin/dist/js/adminlte.js"></script>
<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>
<script src="/admin/admin.js"></script>
<script src="/public/admin/dist/js/bootstrap.bundle.min.js"></script></body></html>