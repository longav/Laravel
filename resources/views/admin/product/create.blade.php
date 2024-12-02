@extends('layout.layout')

@section('title', 'Thêm Mới Sản Phẩm')


@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Thêm Mới Sản Phẩm</h2>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Tiêu đề -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Nhập mô tả"></textarea>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="img_thumbnail" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá">
                    </div>

                    <!-- Số lượng -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            placeholder="Nhập số lượng">
                    </div>

                    <!-- Danh mục -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="" selected disabled>Chọn danh mục</option>
                            @foreach ($category as $category)
                                <option value="{{ $category -> id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nút Submit -->

                    <input type="reset" value="Nhập lại" class="btn btn-outline-primary ">
                     <button type="submit"class="btn btn-primary ms-1">Thêm Mới</button>
                </form>
            </div>

        </div>

    </div>

@endsection
