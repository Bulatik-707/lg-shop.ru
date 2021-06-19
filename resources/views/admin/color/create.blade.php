@extends('layouts.admin_layout')

@section('title', 'Добавить цвет')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить цвет</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-none">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- //Выводим СМС из CategorieController.php  метод store -->
        @if(session('success')) 
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> 
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif
        @if ($errors->any())
            <div class="col-md-6 alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  <p>{{ $error }}</p>
                @endforeach
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
                <form action="{{route('color.store')}}" method="POST">
                    <!-- @method('POST') -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group ">
                        <label for="exampleInputColor">Цвет</label>
                          <!-- Вывод ошибок -->
                          @error('name')
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <!-- //Вывод ошибок  -->
                       <input type="text" name="name" value="{{ old('name') }}"  class="form-control col-6 @error('name') is-invalid @enderror" id="exampleInputColor" 
                            placeholder="Введите название цвета">
                            <!-- <small class="form-text text-muted">Мы никогда никому не передадим Вашу электронную почту.</small> -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection