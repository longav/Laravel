@extends('layout.layout')

@section('title', 'Chỉnh Sửa Danh Mục')


@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Chỉnh Sửa Danh Mục</h2>
                <form action="{{ route('category.update',$category -> id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Tiêu đề -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="Nhập tên danh mục" value="{{$category -> name}}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span> <br>
                    @enderror
                    <!-- Mô tả -->
                  

                    <!-- Nút Submit -->

                    <input type="reset" value="Nhập lại" class="btn btn-outline-primary ">
                     <button type="submit"class="btn btn-primary ms-1">Cập nhập Mới</button>
                </form>
            </div>

        </div>

    </div>

@endsection
