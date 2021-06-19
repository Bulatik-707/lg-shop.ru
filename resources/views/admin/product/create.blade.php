@extends('layouts.admin_layout')

@section('title', 'Добавить изделие')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить изделие</h1>
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

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
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
                <form action="{{route('product.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- //Определение списка категорий -->
                        <div class="form-group">
                            <label>Выберите каталог</label>
                            <select name="catalog_id" class="form-control col-6" required>
                                <option value="">Выберите из списка</option>
                                @foreach($catalogs as $catalog)
                                    <option value="{{$catalog['id']}}">{{$catalog['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                        <label for="exampleInputProduct">Изделие</label>
                        <input type="text" name="name" class="form-control col-6" id="exampleInputProduct"
                            placeholder="Введите название изделия" required>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputProduct">Изображение</label>
                            <img src="" id="showImage" alt="Загруженное изображение" class="my-3 card-img-top img-jumbo" style="display: block; width: 300px;">
                            <input type="file" class="form-control col-6" id="image"
                                name="image" onchange="loadImage(this)" value="">

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
                        <!-- //Определение списка цветов -->
                        <div class="form-group">
                            <label>Выберите цвет</label>
                            <select name="color_id" class="form-control col-6" required>
                                <option value="">Выберите из списка</option>
                                @foreach($colors as $color)
                                    <option value="{{$color['id']}}">{{$color['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- //Определение текста статьи -->
                        <div class="form-group">
                            <label for="exampleInputProduct">Описание</label>
                            <br>
                            <textarea name="description" class="editor form-control col-6" id="exampleInputProduct"
                                placeholder="Введите описание изделия" required></textarea>
                        </div>
                        <div class="form-group ">
                        <label for="exampleInputProduct">Цена</label>
                        <input type="text" name="price" class="form-control col-4" id="exampleInputProduct"
                                placeholder="Введите цену изделия" required>
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
