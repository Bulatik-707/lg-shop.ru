@extends('layouts.admin_layout')

@section('title', 'Добавить категорию')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить каталог</h1>
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

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{route('catalog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group ">
                        <label for="exampleInputCatalog">каталог</label>
                        <input type="text" name="name" class="form-control col-6" id="name" value="{{ old('name') }}"
                            placeholder="Введите название каталога" required>
                        </div>
                        <!-- Изображение -->
                        <div class="form-group ">
                        <label for="exampleInputCatalog">Изображение</label>
                        <!-- <img src="asset('/storage/image/'.$catalog->image)" id="showImage" style="display: block; width: 150px;">
                             <img src="" id="showImage" id="exampleInputCatalog" alt="Загруженное изображение"
                                 class="my-3 card-img-top img-jumbo" style="display: block; width: 150px;"> -->
                        <img src="" id="showImage" alt="{{ old('name') }}" class="my-3 card-img-top img-jumbo" style="display: block; width: 250px;">
                        <input type="file" id="image" name="image" onchange="loadImage(this)"  class="form-control-file" id="exampleInputCatalog">

                          <!-- //Показать выбраное Изображение -->
                          <script>
                              function loadImage(e){
                                  showImage.bidden = false;
                                  showImage.src = URL.createObjectURL(e.files[0]);
                                  showImage.onload = function(){
                                    URL.revokeObjectURL(e.src);
                                  }
                              }
                              tinymce.init({
                                selector: 'textarea',
                                plugins: 'advlist autolink lists charmap print preview hr',
                                toolbar_mode: 'floating',
                              })
                          </script>
                          <!-- ///Показать выбраное Изображение -->
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
