@extends('layout.layout')

@section('title', 'Trang chủ')

@section('content')
<form action="{{route('oder')}}" method="post">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th>Chọn sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $productId => $item)
                <tr>
                    <td>
                        <input type="checkbox" name="products[{{ $productId }}]" value="true">
                    </td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['price'], 0, ',', '.') }} VND</td>
                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VND</td>
                    <td>
                        <a href="{{ route('detroy', $item['id']) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc không')"  >Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-success text-right">Thanh toán</button>
</form>

<p class="text-end">Tổng tiền: 
    {{ number_format(array_sum(array_column($cart, 'price')) * array_sum(array_column($cart, 'quantity')), 0, ',', '.') }} 
    VND
</p>

@endsection
