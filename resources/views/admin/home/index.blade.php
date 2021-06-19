@extends('layouts.admin_layout')
@section('title', 'Главная')

@section('content')
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$Colors_count}}</h3>
                <p>Цвета</p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="{{route('color.index')}}" class="small-box-footer">Все цвета<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$Catalogs_count}}</h3>
                <p>Категории</p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="{{route('catalog.index')}}" class="small-box-footer">Все категории<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$Products_count}}</h3>
                <p>Изделия</p>
              </div>
              <div class="icon">
                <i class=" "></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer">Все изделия<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$Orders_count}}</h3>
                <p>Заказы</p>
              </div>
              <div class="icon">
                <i class=""></i>
              </div>
              <a href="{{route('order.index')}}" class="small-box-footer">Все заказы<i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
 
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection