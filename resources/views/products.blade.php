@extends('layouts.index')
@section('title', 'Изделия')
@section('content')
<div class="album py-2 bg-light">
    <div class="container">
    <!-- IF поиск/фильтрация нашла изделия -->
    <form action="{{route('products')}}" method="get" class="row">
        <div class="col-5 mb-3">
            <div class="form-label">Выберите каталог </div>
            <select name="filterCatalog_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                @foreach($catalogs as $catalog)
                <option value="{{ $catalog->id}}" @if(isset($_GET['catalog_id'])) @if($_GET['catalog_id'] == $catalog->id) selected @endif @endif>{{$catalog->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-5 mb-3">
            <div class="form-label">Цена:</div>
            <select class="form-select" name="filter_Price_Order">
                <option value="desc">Выводить по:</option>
                <option value="asc">возрастанию</option>
                <option value="desc">убыванию</option>
            </select>
        </div>

        <div class="col-2 mb-3">
            <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Фильтрация"><i class="fas fa-filter"></i></button>
        </div>
    </form>
    <hr>
    @if(count($products))
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        
        @endif
        <div class="row">
        @foreach($products as $product)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 pt-4">
            <div class="card h-100">
            <!-- <a href="{route('product.show', $product->id)}}"><img class="card-img-top"  src="{asset('/storage/image/'.$product->image)}}" alt="{{$product->name}}" style="display: block; height: 250px;"></a> -->
            <a href="{{route('product_id', [$product->id])}}"><img class="card-img-top"  src="{{asset('storage/image/'.$product->image)}}" alt="{{$product->name}}" style="display: block; height: 250px; border: solid 2px;"></a>

                <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="card-title text-center"><b>Цена: </b> {{$product->price}} руб.</p>
                </div>
                <div class="text-center pb-2">
                <a class="btn btn-primary" href="{{route('product_id', [$product->id])}}"  class="text-decoration-none">Подробнее</a>
                <a class="btn btn-danger" href="{{route('add', ['id' => $product->id])}}" class="text-decoration-none"  data-toggle="tooltip" data-placement="top" title="Добавить в корзину"><i class="fas fa-cart-plus"></i></a>
                </div>
            </div>

            </div>
            @endforeach
        </div>
            <div class="justify-content-center pt-5">
                {{$products->onEachSide(2)->links()}}
            </div>
    @else
        <div class="text-center pt-4">
            <h2>Поиск изделий:</h2>
            <p class="text-info">Записей не найдено....</p>
            <p class="text-danger font-weight-bold">У нас еще есть и другие аксессуары!</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
            </svg>
        </div>

    @endif
    </div>
</div>
@endsection