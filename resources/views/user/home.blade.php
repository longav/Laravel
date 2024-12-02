@extends('layout.layout')

@section('title', 'Trang chủ')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 w-100">
                @foreach ($list as $item)
                    <div class="col">
                        <div class="card">
                            <!-- Đặt lớp "img-fluid" và "custom-img" cho ảnh -->
                            <img src="{{Storage::url($item -> img_thumbnail)}}" 
                                 alt="{{$item -> img_thumbnail}}" 
                                 class="img-fluid h-50 custom-img">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text d-flex justify-content-between">
                                    <span>{{ $item -> title }}</span>
                                    <span class="me-3 text-bold">${{ $item->price }}</span>
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('detail', $item->id) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary text-dark">Detail</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            
            
        </div>
    </div>
@endsection
