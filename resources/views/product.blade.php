@extends('layouts.index')
@section('title', 'Изделие')
@section('content')
    <div class="main py-3 bg-light">
    <div class="container align-items-center">
    <div class="card bg-light">
        <div class="row no-gutters">
            <div class="col-5 ml-md-auto">
            <img src="{{asset('/storage/image/'.$product->image)}}" class="w-100 h-75" alt="{{$product->name}}" style="display: block;  border: solid 2px;">
            </div>
            <div class="col-7">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text"><b>Цвет: </b> {{$product->color->name}}</p>
                <p class="card-text"><b>Цена: </b> {{$product->price}} руб.</p>
                <p class="card-text"><b>Описание: </b> {{$product->description}}</p>
            </div>
            <div class="card-body">
                <a href="{{route('add', ['id' => $product->id])}}"><button type="submit" class="btn btn-danger">Добавить в корзину</button></a>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection