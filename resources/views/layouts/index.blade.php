<?php
use App\Models\Catalog;
$catalogs_footer = Catalog::orderBy('name', 'asc')->get();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="container navbar navbar-expand-md navbar-light fixed-top bg-light">
        <a class="navbar-brand font-weight-bold" href="{{route('home')}}">Leather goods</a>
        <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Переключатель навигации"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('products')}}">Изделия</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Еще</a><div class="dropdown-menu" aria-labelledby="dropdown01"><a class="dropdown-item" href="{{route('contacts')}}">Контакты</a><a class="dropdown-item" href="{{route('about')}}">О Нас</a><a class="dropdown-item" href="{{route('price')}}">Оплата</a><a class="dropdown-item" href="{{route('delivery')}}">Доставка</a></div></li></ul></div>
        <div class="row mr-4 ml-1 pr-3 pt-2"><div class="navbar-nav col-12"> <form method="get" action="{{ route('products') }}">
                    <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" @if(isset($_GET['search'])) value="{{$_GET['search']}}" @endif placeholder="Поиск изделий"><div class="input-group-append">
                        <button type="submit" class="btn btn-primary"  class="text-decoration-none"  data-toggle="tooltip" data-placement="top" title="Найти"><i class="fas fa-search"></i></button> </div></div></form></div></div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown"><a href="{{route('basket')}}" class="text-decoration-none"><span style="color: #e81a1a"  data-toggle="tooltip" data-placement="top" title="Корзина"><i class="fas fa-shopping-cart fa-2x"></i></span><span class="badge badge-info navbar-badge basket-kol" style="vertical-align: top;"  class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Кол-во изделий">{{Session::has('Basket') ? Session::get('Basket')->totalQty : ''}}</span></a> </li></ul></nav>
    <main role="main" class="container content-wrapper pt-3" style="margin-top: 120px;">
    @yield('content')</main>
    <footer class="container my-5 pt-5 bg-light">
    <div class="row"><div class="col-4">
        <h5 class="text-uppercase font-weight-bold">Изделия</h5>
        <ul class="list-unstyled text-small">
            @foreach($catalogs_footer as $catalog) 
            <li><a class="font-weight-bold" href="{{route('catalog-one.show', $catalog->id)}}">{{$catalog->name}}</a></li>
            @endforeach  </ul></div>
      <div class="col-4">
        <h5 class="text-uppercase font-weight-bold">Магазин</h5>
        <ul class="list-unstyled text-small">
          <li><a class="font-weight-bold" href="{{route('about')}}">О нас</a></li>
          <li><a class="font-weight-bold" href="{{route('contacts')}}">Контакты</a></li>
          <li><a class="font-weight-bold" href="{{route('price')}}">Оплата</a></li>
          <li><a class="font-weight-bold" href="{{route('delivery')}}">Доставка</a></li> </ul> </div>
      <div class="col-4">
        <h5 class="text-uppercase font-weight-bold">Контакты</h5>
        <ul class="list-unstyled text-small">
            <address><strong>Тел: </strong>+7 (927) 247 04-56<br><strong>E-mail:</strong> lg.shop.kzn@gmail.com<br> <strong>Адрес:</strong><br> г. Казань </address><hr>
            <a href="https://vk.com/leather_accessories_1" class="" data-toggle="tooltip" data-placement="top" title="Мы в VK"><i class="fab fa-vk fa-2x"></i></a></ul> </div></div>  <hr>
    <div class="row text-center"> <div class="col-12"> <p> 2021 &copy; Leather goods - Интернет-магазин</p></div></div>
</footer>
<style>
img{ max-width: 100%;height: auto;}
@media (max-width: 320px) { .card-body h4{font-size: 12px;}.card-body p{ font-size: 12px;}.card img{  max-width: 100%;height: 50%;}}
@media (max-width: 480px) {.card-body h4{ font-size: 14px;}.card-body p{ font-size: 16px;}.card img{ max-width: 100%; height: 200px;}}
@media (min-width: 576px) and (max-width: 767px) {.card-body h4{ font-size: 14px; }.card-body p{font-size: 16px;}.card img{ max-width: 100%; height: 250px;}}
@media (min-width: 768px) and (max-width: 992px) { .card-body h4{font-size: 20px;}.card-body p{font-size: 18px;}.card img{max-width: 100%; height: 250px;}}
@media (min-width: 1024px) and (max-width: 1279px) {.card-body h4{font-size: 24px;} .card-body p{font-size: 22px;}.card img{ max-width: 100%; height: 250px;}}
@media (min-width: 1280px) {p{font-size: 16px;}}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<style src="/public/admin/dist/js/bootstrap.bundle.js"></style>
<style src="/public/admin/dist/js/bootstrap.bundle.min.js"></style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 @stack('scripts')</body></html>