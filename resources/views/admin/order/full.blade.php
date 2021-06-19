@extends('layouts.admin_layout')
@section('title', 'Подробное описание заказа')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h5 class="m-0">Подробное описание заказа: № {{$order->id}} <br> От: {{$order['date']}}</h5>
            </div>

            <div class="col-12 pt-4">
                    <div class="card-body p-0">
                        <div class="form-group">
                        <label for="name">Фамилия</label>
                        <input type="text" name="lastname" id="lastname"  class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                            value="{{ old('lastname', $order->user->lastname) }}" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="firstname" id="firstname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('firstname', $order->user->firstname) }}" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">E-mail</label>                          
                            <input type="text" name="email" id="email" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('email', $order->user->email) }}" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Телефон</label>
                            <input type="text" name="telephone" id="telephone" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('telephone', $order->user->telephone) }}" readonly class="form-control-plaintext" data-inputmask="(999) 999-99-99">

                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Способ доставки:</label>
                            <input name="deliverymethod_id" id="deliverymethod_id" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('deliverymethod_id', $order->deliverymethod->name) }}" readonly class="form-control-plaintext"></input>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Статус заказа:</label>
                            <input name="orderstatus_id" id="dorderstatus_id" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('orderstatus_id', $order->orderstatus->name) }}" readonly class="form-control-plaintext"></input>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Город</label>
                            <input type="text" name="city" id="city" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('city', $order->city) }}" placeholder="Не заполнено" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('address', $order->address) }}" placeholder="Не заполнено" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Индекс</label>
                            <input type="text" name="index" id="index" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('index', $order->index) }}" placeholder="Не заполнено" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Комментарий</label>
                            <br>
                            <textarea name="note" rows="3" class="editor form-control col-12 col-sm-12 col-md-6 col-lg-6" id="exampleInputProduct"
                                    value="{{ old('note', $order->note) }}" placeholder="Не заполнено" readonly></textarea>
                        </div>
                        </div> <!-- / form-group-->

                    </div>
                    <!-- /.card-body -->

                    <!-- /Card -->
                    <div class="form-group">
                        <h1>Корзина:</h1>
                            <div class="cart">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="">
                                                <div class="table-content table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Изделие</th>
                                                                <th>цена</th>
                                                                <th>Количество</th>
                                                                <th>Сумма</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($basket as $item)
                                                            <tr>
                                                                <td><a href="">{{$item->product->name}}</a></td>
                                                                <td>{{$item->product->price}} руб.</td>
                                                                <td class="quantity">
                                                                    <span name="amount" id="input-amount">{{$item->amount}}</span>
                                                                <!-- <td>
                                                                    <input type="number" name="amount" id="input-amount" value="{{$item->amount}}" style="width: 100px;"> 
                                                                </td> -->
                                                                <td>{{$item->product->price * $item->amount}} руб.</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <p>$$$</p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card end -->

            </div><!-- /.col -->
        </div>
    </div>
</div>
@endsection