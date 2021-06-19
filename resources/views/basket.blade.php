@extends('layouts.index')
@section('title', 'Корзина')

@section('content')
<section class="content">
<div class="container bg-light">
   <h1>Корзина</h1>
   @if(Session::has('Basket'))
   <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-12 offset-7 pb-3"> 
                <a href=""><button type="submit" class="btn btn-primary d-none">Продолжить покупки</button></a>
            </div>
            
            <table class="table">
                <thead>
                <tr>
                    <th class="d-none d-md-block">Фото</th>
                    <th>Изделие</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Сумма</th>
                    <th></th>
                </tr> 
                </thead>
                <tbody>
                @foreach($baskets as $basket)
                <tr>
                    <td class="align-middle d-none d-md-block"><img class="card-img-top"  src="{{asset('/storage/image/'.$basket['item']['image'])}}" alt="{{$basket['item']['name']}}" style="display: block; width: 100px; height: 100px;  border: solid 2px;"></td>
                    <td><a href="{{route('product_id', [$basket['item']['id']])}}">{{$basket['item']['name']}}</a></td>
                    <!-- <td><a href="{route('product_id', [$product->id])}}">{$basket->product->name}}</a></td> -->
                    <td><p class="text-center">{{$basket['item']['price']}} руб.</p></td>
                    <td class="project-actions">
                        <a href="{{ route('reduceByOne', ['id' => $basket['item']['id']]) }}" class="text-decoration-none"
                            data-toggle="tooltip" data-placement="top" title="Уменьшить">
                            <button type="submit" class="m-1 pr-1 border-0 bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" style="color: red;" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
                            </button>
                        </a>
                        <span name="amount" id="input-amount" class="font-weight-bold">{{$basket['amount']}}</span>
                        <a href="{{ route('increaseByOne', ['id' => $basket['item']['id']]) }}" class="text-decoration-none"
                            data-toggle="tooltip" data-placement="top" title="Увеличить">
                            <button type="submit" class="m-1 pl-1 border-0 bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" style="color: red;" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                            </button>
                        </a>
                    </td>
                    <td>{{$basket['price']}} руб.</td>
                    <td class="m-0 pt-4">
                      <a href="{{ route('remove', ['id' => $basket['item']['id']]) }}" class="text-decoration-none"  data-toggle="tooltip" data-placement="top" title="Удалить">
                      <button type="submit" class="btn btn-sm delete-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: red;" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg></button>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Итого</th>
                    <th>{{$totalPrice}} руб.</th>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-4 offset-8 pb-2">
                <a href="{{route('order')}}"><button type="submit" class="btn btn-danger">Заказать</button></a>
                </div>
            </div>
        </div>
   </div>
   <!-- ЕСЛИ Пусто -->
   @else
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 pt-4">
            <h4>Корзина пуста!<br>Добавьте изделие в корзину, для оформления заказа.</h4>
            <h5>
            <a class="font-weight-bold d-none" href="{{route('catalogs')}}">Каталог изделий</a><br>
            <a class="font-weight-bold" href="{{route('products')}}">Все изделия</a>
            </h5>
        </div>
    </div>
   @endif
</div>
</section>
@endsection