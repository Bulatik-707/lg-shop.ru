@extends('layouts.admin_layout')

@section('title', 'Редактировать изделие')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать изделие: {{$product['name']}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 d-none">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- //Выводим СМС из ColorController.php  метод store -->
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
                <form action="{{route('product.update', $product['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <!-- //Определение списка категорий -->
                        <div class="form-group">
                            <label>Выберите каталог</label>
                            <select name="catalog_id" class="form-control col-6">
                                <option value="">Выберите из списка</option>
                                @foreach($catalogs as $catalog)
                                    <option  value="{{ old('catalog_id', $catalog->id) }}"
                                    @if($catalog['id'] == $product['catalog_id'])
                                    selected
                                    @endif>
                                    {{$catalog['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputProduct">Название</label>
                            <input type="text" name="name" class="form-control col-6" id="exampleInputProduct"
                                 value="{{ old('name', $product->name) }}">
                        <!--  value="{$product['name']}}" -->
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputProduct">Изображение</label>
                            <img src="/storage/app/public/image/{{ $product->image }}" id="showImage" alt="{{$product['name']}}" class="my-3 card-img-top img-jumbo" style="display: block; width: 300px;">
                            <input type="file" value="{{ old('image', $product->image) }}" class="form-control col-6" id="image"
                                name="image" onchange="loadImage(this)">

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
                            <select name="color_id" class="form-control col-6">
                                <option value="">Выберите из списка</option>
                                @foreach($colors as $color)
                                    <option  value="{{ old('color_id', $color->id) }}" @if($color['id'] == $product['color_id']) selected @endif>{{$color['name']}}</option>
                                @endforeach
                            </select>
                            <!-- //Определение текста статьи -->
                            <div class="form-group">
                                <label for="exampleInputProduct">Описание</label>
                                <br>
                                <textarea name="description" rows="3" class="editor form-control col-6" id="description">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputProduct">Цена</label>
                                <input type="text" name="price" class="form-control col-6" id="price"
                                   value="{{ old('price', $product->price) }}">
                            </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
