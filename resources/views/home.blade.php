@extends('layouts.index')
@section('title', 'Главная')

@section('content')
<section class="jumbotron text-center bg-light py-2">
          <div class="container">
              <h1 class="jumbotron-heading">Leather goods</h1>
              <h5>Изделия из натуральной кожи  ручной работы
              На нашем сайте вы можете заказать изделия: кошельки, обложки, мужские ремни, ремешки для часов, калдхолдеры, брелки, аксессуары.
              Доставка Почтой России или CDEK.
              </h5>
          </div>
</section>

<div class="py-3 bg-light">
    <div class="container">
    <div class="row">
    @foreach($catalogs as $catalog)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3"  class="text-decoration-none"  data-toggle="tooltip" data-placement="top" title="Посмотреть изделия">
        <div class="card">
        <a href="{{route('catalog-one.show', $catalog->id)}}"><img class="card-img-top" src="/storage/image/{{$catalog->image}}" alt="{{$catalog->name}}" style="display: block; height: 250px; border: solid 2px; filter:brightness(60%);"></a>
            <div class="carousel-caption">
            <h3 class="text-center">{{$catalog->name}}</h3>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
@endsection