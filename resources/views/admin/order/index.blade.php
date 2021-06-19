@extends('layouts.admin_layout')
@section('title', 'Все заказы')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Все заказы</h1>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif
        <form action="{{route('order.index')}}" method="get">
            <p>Фильтрация по:</p>
            <!-- Способ доставки -->
            <div class="mb-3">
                <div class="form-label">Способ доставки</div>
                    @foreach($deliveryMethods as $deliveryMethod)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="adminFilter_DM" value="{{ $deliveryMethod->id }}" id="adminFilter_DM.{{$deliveryMethod->id}}" @if(isset($_GET['deliverymethod'])) @if($_GET['deliverymethod'] == $deliveryMethod->id) selected @endif @endif>
                        <label class="form-check-label" for="adminFilter_DM.{{$deliveryMethod->id}}">{{$deliveryMethod->name}}</label>
                    </div>
                    @endforeach
            </div>
            <!-- /Способ доставки -->
            <!-- Статус заказа -->
            <div class="mb-3">
                <div class="form-label">Статус заказа</div>
                    @foreach($orderStatuses as $orderStatus)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="adminFilter_OS" value="{{$orderStatus->id}}" id="adminFilter_OS.{{$orderStatus->id}}" @if(isset($_GET['orderstatus'])) @if($_GET['orderstatus'] == $orderStatus->id) selected @endif @endif>
                        <label class="form-check-label" for="adminFilter_OS.{{$orderStatus->id}}">{{$orderStatus->name}}</label>
                    </div>
                    @endforeach
            </div>
            <!-- /Статус заказа -->
            <button type="submit" class="btn btn-primary">Показать</button>
        </form>
        <!-- Поиск -->
        <form method="get" action="{{ route('order.index') }}">
        <div class="form-row">
            <div class="form-group col-3">
                <input type="text" class="form-control" name="adminSearch"  @if(isset($_GET['adminSearch'])) value="{{$_GET['adminSearch']}}" @endif placeholder="Поиск изделий">
            </div>
            <div class="form-group col-2">
                <button type="submit" class="btn btn-primary btn-block">Найти</button>
            </div>
        </div>
        </form>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
    <!-- IF поиск/фильтрация нашла изделия -->
    @if(count($orders))
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr> <th style="width: 5%">ID</th>
                                <th>Клиент</th>
                                <th>Способ доставки</th>
                                <th>Статус заказа</th>
                                <th>Комментарий</th>
                                <th>Дата заказа</th>
                                <th style="width: 20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($orders as $order)
                            <tr> <td>{{$order->id}}</td>
                                <td name="lastname">{{$order->client->lastname}}</td>
                                <td>{{$order->deliverymethod->name}}</td>
                                <td>{{$order->orderstatus->name}}</td>
                                <td name="note">{{$order->note}}</td>
                                <td>{{$order['date']}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('order.edit', $order['id'])}}" data-toggle="tooltip" title="Редактировать">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <!-- УБРАТЬ редактирование меняем только статус -->
                                    <a class="btn btn-success btn-sm" href="{{route('order.full', $order['id'])}}" data-toggle="tooltip" title="Подробное описание заказа">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

    @else
        <h2>Поиск изделий:</h2>
        <p>Записей не найдено....</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
        </svg>
    @endif
    </div>
</section>
@endsection