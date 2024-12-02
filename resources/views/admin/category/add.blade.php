@extends('layout.layout')

@section('title', 'Thêm Mới Danh Mục')


@section('content')

    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <h2 class="text-center mb-4">Thêm Mới Danh Mục</h2>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Tiêu đề -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="Nhập tên danh mục">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span> <br>
                    @enderror
                    <!-- Mô tả -->
                  

                    <!-- Nút Submit -->

                    <input type="reset" value="Nhập lại" class="btn btn-outline-primary ">
                     <button type="submit"class="btn btn-primary ms-1">Thêm Mới</button>
                </form>
            </div>

        </div>

    </div>

@endsection
