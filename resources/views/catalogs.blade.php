@extends('layouts.index')
@section('title', 'Каталог')
@section('content')
<div class="album py-3 bg-light">
    <div class="container">
        <div class="row">
        @foreach($catalogs_all as $catalog)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 py-3">
                <div class="card h-100">
                <a href="{{route('catalog-one.show', $catalog->id)}}" class="text-decoration-none" >
                    <img src="/storage/image/{{$catalog->image}}" class="" alt="{{$catalog->name}}" style="display: block; height: 250px; border: solid 2px; filter:brightness(50%);">
                        <div class="card-img-overlay ">
                            <h3 class="card-text" style="vertical-align: text-top;">{{$catalog->name}}</h3>
                        </div>
                </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection