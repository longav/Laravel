@extends('layout.layout')

@section('title', 'Danh sách')

@section('content')
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Danh sách sản phẩm danh mục</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

            @foreach ($products as $item)
                <div class="feature col">

                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center  ">
                        <img src="{{ Storage::url($item->img_thumbnail) }}" class="w-50 " alt="{{ $item->img_thumbnail }}">
                    </div>
                    <h3 class="fs-2 text-body-emphasis">{{ $item -> title }}</h3>
                    <p>{{ $item->description }}</p>
                    <a href="{{route('detail', $item -> id) }}" class="icon-link">
                        {{ $item -> title }}
                        <svg class="bi">
                            <use xlink:href="#chevron-right"></use>
                        </svg>
                    </a>
                </div>
            @endforeach


        </div>
        {{ $products ->links() }}
    </div>



@endsection
