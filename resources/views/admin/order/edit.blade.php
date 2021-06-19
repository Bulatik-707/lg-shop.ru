@extends('layouts.admin_layout')

@section('title', 'Редактировать заказ')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Изменить статус заказ:  № {{$order->id}}</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- //Выводим СМС из ColorController.php  метод store -->
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{route('order.update', $order['id'])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Фамилия</label>
                        <input type="text" name="lastname" id="lastname"  class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                            value="{{ old('lastname', $order->user->lastname) }}" placeholder="Фамилия" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="firstname" id="firstname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('firstname', $order->user->firstname) }}" placeholder="Имя" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">E-mail</label>                          
                            <input type="text" name="email" id="email" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('email', $order->user->email) }}" placeholder="Адрес E-mail" readonly class="form-control-plaintext">
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
                            <select name="orderstatus" id="orderstatus" class="form-control col-12 col-sm-12 col-md-6 col-lg-6" required>
                                @foreach($orderStatuses as $orderstatus)
                                    <option  
                                        value="{{ old('orderstatus_id', $orderstatus->id) }}"
                                        @if($orderstatus['id'] == $order['orderstatus_id'])
                                        selected
                                        @endif>
                                        {{$orderstatus['name']}}
                                    </option>
                                @endforeach
                            </select>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Город</label>
                            <input type="text" name="city" id="city" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('city', $order->city) }}" placeholder="Не заполнено" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('address', $order->address) }}" placeholder="Не заполнено"" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Индекс</label>
                            <input type="text" name="index" id="index" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('index', $order->index) }}" placeholder="Не заполнено"" readonly class="form-control-plaintext">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Комментарий</label>
                            <br>
                            <textarea name="note" rows="3" class="editor form-control col-12 col-sm-12 col-md-6 col-lg-6" id="exampleInputProduct"
                                    value="{{ old('note', $order->note) }}"></textarea>
                        </div>
                        </div> <!-- / form-group-->

                        <!-- /Card -->
                        <div class="form-group">
                        <h3>Корзина:</h3>
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
                                                        <?= $Price = 0 ?>
                                                        @foreach($baskets as $basket)
                                                            <tr>
                                                                <td><a href="">{{$basket->product->name}}</a></td>
                                                                <td>{{$basket->product->price}} руб.</td>
                                                                <td>
                                                                    <span name="amount" id="input-amount">{{$basket->amount}}</span>
                                                                </td>
                                                                <td><?= $Price = $basket->product->price * $basket->amount ?> руб.</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tr>
                                                            <th colspan="3" class="text-right">Итого</th>
                                                            <th><?= $totalPrice = $Price ?> руб.</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card end -->

                        <div class="form-group d-none" >
                            <label for="name">...</label>
                            <input type="text" name="" id="" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('name') }}" placeholder="Введите" required>
                        </div> <!-- / form-group-->

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
