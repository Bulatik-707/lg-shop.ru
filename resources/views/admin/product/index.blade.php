@extends('layouts.admin_layout')
@section('title', 'Все изделия')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
            <h1 class="m-0">Все изделия</h1>
            </div>
            <a href="{{route('product.create')}}"><h5 class="font-weight-bold pl-3 pt-2">Добавить изделие</h5></a>
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
    <div class="container-fluid">
        <div class="row">
        <!-- IF поиск/фильтрация нашла изделия -->
        @if(count($products))
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr> <th style="width: 5%">ID</th>
                                <th>Каталог</th>
                                <th>Название изделия</th>
                                <th>Изображение</th>
                                <th>Цвет</th>
                                <th>Описание</th>
                                <th>Цена</th>
                                <th style="width: 40%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все записи -->
                            @foreach($products as $product)
                            <tr> <td>{{$product['id']}}</td>
                                <td>{{$product->catalog->name}}</td>
                                <td>{{$product['name']}}</td>
                                <td><img src="/storage/image/{{$product->image}}"  style="display: block; width: 100px; height: 100px;"></td>
                                <td>{{$product->color->name}}</td>
                                <td><p class="text-ellipsis">{{$product['description']}}</p></td>
                                <td>{{$product['price']}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('product.edit', $product['id'])}}" data-toggle="tooltip" title="Редактировать">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <!-- <a class="btn btn-success btn-sm mt-1" href="{{route('product.edit', $product['id'])}}" data-toggle="tooltip" title="Подробнее">
                                        <i class="fas fa-eye"></i>
                                    </a> -->
                                    <form action="{{route('product.destroy', $product['id'])}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-1" data-toggle="tooltip" title="Удалить">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.col -->
        @else
            <h2>Поиск изделий:</h2>
            <p class="">Записей не найдено....</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
            </svg>
        @endif
        </div>
    </div>
</section>

<style>
    tr{
        padding: 1rem;
        max-width: 50vw;
    }
    .text-ellipsis{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 4;
    }
</style>

@endsection
