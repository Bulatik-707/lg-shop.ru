@extends('layouts.admin_layout')
@section('title', 'Все цвета')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
            <h1 class="m-0">Все цвета</h1>
            </div>
            <a href="{{route('color.create')}}"><h5 class="font-weight-bold pl-3 pt-2">Добавить цвет</h5></a>
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
            <div class="col-6">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr> <th style="width: 5%">ID</th>
                                <th>Название</th>
                                <th style="width: 30%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($colors as $color)
                            <tr> <td> {{$color['id']}} </td>
                                <td> {{$color['name']}} </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('color.edit', $color['id'])}}" data-toggle="tooltip" title="Редактировать">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{route('color.destroy', $color['id'])}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn mt-1" data-toggle="tooltip" title="Удалить">
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
        </div>
    </div>
</section>

@endsection