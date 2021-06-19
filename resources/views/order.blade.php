@extends('layouts.index')
@section('title', 'Заказ')


@section('content')
<div class="container bg-light">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Оформление заказа:</h3>
          </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif
      </div>
    </div>

    <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-8 col-lg-8 pt-4">
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{route('order')}}" method="post" id="order-form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <h3>Ваша корзина</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>№</th>
                                    <th>Изделие</th>
                                    <th>Цена</th>
                                    <th>Кол-во</th>
                                    <th>Сумма</th>
                                </tr>
                                    @foreach($baskets as $basket)        
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td name="order_id" class="d-none" value="{{$basket['item']['name']}}"></td>
                                        <td name="product_id" id="product_id" value="{{$basket['item']['id']}}" class="d-none"></td>
                                        <td>{{$basket['item']['name']}}</td>
                                        <td>{{$basket['item']['price']}} руб.</td>
                                        <td name="amount" id="amount"><span class="mx-1">{{$basket['amount']}} шт.</span></td>
                                        <td>{{$basket['price']}} руб.</td>
                                    @endforeach
                                    </tr>
                                    
                                <tr>
                                    <th colspan="3" class="text-right">Итого</th>
                                    <th>{{$total}} руб.</th>
                                </tr>
                            </table>
                        </div><!-- / form-group-->
                        <div class="form-group">
                        @if ($errors->any())
                            <div class="col-md-12 alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <h3>Личные данные</h3>
                        <label for="name">Фамилия</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                            </svg>
                        <input type="text" name="lastname" id="lastname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                               value="{{ old('lastname') }}" placeholder="Фамилия" required>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Имя</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                    <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                            <input type="text" name="firstname" id="firstname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('firstname') }}" placeholder="Имя" required>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">E-mail</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                    <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                            <input type="email" name="email" id="email" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('email') }}" placeholder="Адрес E-mail"  aria-describedby="emailHelpBlock" required>
                                   <small id="emailHelpBlock" class="form-text text-muted"></small>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Телефон</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                    <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                            <input type="tel" name="telephone" id="telephone" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('telephone') }}" maxlength="10"  placeholder="(999) 999 99-99"  aria-describedby="telephone" required>
                                   <small id="telephone" class="form-text text-muted">Введите телефон "(999) 999 99-99, Без "( )", "-" и пробелов!</small>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <h3>Способ доставки:</h3>
                            <label for="name">Доставка</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                    <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z"/>
                                </svg>
                            <select name="deliveryMethod" id="deliveryMethod" class="form-control col-12 col-sm-12 col-md-6 col-lg-6" required aria-describedby="deliveryMethod">
                                <option value="null">Выберите способ доставки</option>
                              @foreach($deliveryMethods as $deliveryMethod)
                                <option value="{{ $deliveryMethod->id}}" @if(isset($_GET['delivery_method_id'])) @if($_GET['delivery_method_id'] == $deliveryMethod->id) selected @endif @endif>{{$deliveryMethod->name}}</option>
                                @endforeach
                            </select>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Город</label>
                            <input type="text" name="city" id="city" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('city') }}" placeholder="Введите город">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('address') }}" placeholder="Введите адрес">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Индекс</label>
                            <input type="text" name="index" id="index" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('index') }}" maxlength="6"  placeholder="Введите индекс">
                        </div> <!-- / form-group-->
                        <div class="form-group"></div>
                            <label for="name">Комментарий</label>
                            <br>
                            <textarea name="note" rows="3" class="editor form-control col-12 col-sm-12 col-md-6 col-lg-6" id="exampleInputProduct"
                                      placeholder="Комментарий к заказу"></textarea>
                        </div> <!-- / form-group-->
                    </div>  
                    <div class="card-footer">
                    {{csrf_field()}} 
                    <button type="submit" class="btn btn-primary">Заказать</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>                  