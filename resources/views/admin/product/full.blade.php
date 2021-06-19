@extends('layouts.admin_layout')

@section('title', 'Описание')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Описание изделия: {{$product['name']}}</h1> </div> </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif</div></div>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
                <form action="{{route('product.update', $product['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Каталог</label>
                            <input name="catalog_id" id="catalog_id" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                value="{{ old('catalog_id', $product->catalog->name) }}" readonly class="form-control-plaintext"></input>

                        <div class="form-group ">
                            <label for="exampleInputProduct">Название</label>
                            <input type="text" name="name" class="form-control col-6" id="exampleInputProduct"
                                 value="{{ old('name', $product->name) }}" readonly>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputProduct">Изображение</label>
                            <img src="/storage/app/public/image/{{ $product->image }}" id="showImage" alt="{{$product['name']}}" class="my-3 card-img-top img-jumbo" style="display: block; width: 300px;">
                            <input type="file" value="{{ old('image', $product->image) }}" class="form-control col-6" id="image"
                                name="image" onchange="loadImage(this)">
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
                        </div>
                        <div class="form-group">
                            <label>Выберите цвет</label>
                            <select name="color_id" class="form-control col-6">
                                @foreach($colors as $color)
                                    <option  value="{{ old($color['id']) }}">{{$color['name']}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="exampleInputProduct">Описание</label>
                                <br>
                                <textarea name="description" rows="3" class="editor form-control col-6" id="description">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputProduct">Цена</label>
                                <input type="text" name="price" class="form-control col-6" id="price"
                                   value="{{ old('price', $product->price) }}" readonly>
                            </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
