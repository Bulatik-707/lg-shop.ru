@extends('layouts.admin_layout')
@section('title', 'Каталог')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Каталог</h1>
            </div>
            <a href="{{route('catalog.create')}}" class="nav-link"><h5 class="font-weight-bold pl-3 pt-2">Добавить каталог</h5></a>
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
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr> <th style="width: 5%">ID</th>
                            <th>Изображение</th>
                                <th>Название</th>

                                <th style="width: 40%"></th>
                                </tr>
                            </thead>                            
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($catalogs as $catalog)
                            <tr> <td> {{$catalog['id']}} </td>
                               
                                <td><img src="{{ asset('/storage/image/'.$catalog->image) }}"  style="display: block; width: 75px; height: 75px;"></td>
                                <td> {{$catalog['name']}} </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('catalog.edit', $catalog['id'])}}" data-toggle="tooltip" title="Редактировать">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('catalog.destroy', $catalog['id'])}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" data-toggle="tooltip" title="Удалить">
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
            </div><!-- /.container-fluid -->
        </section>
        </div>
    </div>
</section>

@endsection
