<!-- cart/order.blade.php -->
@extends('layout.layout')

@section('content')
    <div class="container">
        <h2>Chi tiết đơn hàng</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                @if ($oder)
                    @foreach ($oder as $productId => $item)
                        <!-- Chỉ hiển thị sản phẩm được chọn -->
                        <tr>
                            <td>{{ $item[$productId]['title'] }}</td>
                            <td>{{ $item[$productId]['quantity'] }}</td>
                            <td>{{ number_format($item[$productId]['price'], 0, ',', '.') }} VND</td>
                            <td>{{ number_format($item[$productId]['price'] * $item[$productId]['quantity'], 0, ',', '.') }}
                                VND</td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>

        <p>Tổng tiền:
            @if ($oder)
                @foreach ($oder as $productId => $oder)
                    <td>{{ number_format($item[$productId]['price'] * $item[$productId]['quantity'], 0, ',', '.') }} VND
                    </td>
                @endforeach
            @endif
        </p>

        <!-- Form xác nhận thanh toán -->
        <form action="{{ route('add_oder') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
        </form>
    </div>
@endsection
