@extends('layout.layout')

@section('title', 'Chỉnh sửa Sản Phẩm')


@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Chỉnh sửa Sản Phẩm</h2>
                <form action="{{ route('products.update',$product -> id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Tiêu đề -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề" value="{{$product -> title}}">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả" >{{$product -> description}}</textarea>
                    </div>
                    <img src="{{Storage::url($product -> img_thumbnail)}}" alt="">
                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="img_thumbnail" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá" value="{{$product -> price}}">
                    </div>

                    <!-- Số lượng -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            placeholder="Nhập số lượng" value="{{$product -> quantity}}">
                    </div>

                    <!-- Danh mục -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="" selected disabled>Chọn danh mục</option>
                            @foreach ($category as $category)
                                <option value="{{ $category -> id }}" {{$product -> category_id == $category -> id ? 'selected' :''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nút Submit -->

                    <input type="reset" value="Nhập lại" class="btn btn-outline-primary ">
                     <button type="submit"class="btn btn-warning ms-1">Cập nhập</button>
                </form>
            </div>

        </div>

    </div>

@endsection
