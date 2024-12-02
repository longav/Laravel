@extends('layout.layout')


@section('title', 'Chi tiết')


@section('content')
<div class="card m-3 d-flex flex-row">
    <!-- Left side: Image -->
    <div class="me-3">
        <img src="https://tse1.mm.bing.net/th?id=OIP.cFk7icN483HJD3wFnXXyawHaEo&pid=Api&P=0&h=220" class="img-fluid" alt="{{$list->img_thumbnail}}">
    </div>
    
    <!-- Right side: Content -->
    <div class="card-body">
        <h5 class="card-title"><span>Title: </span>{{$list->title}}</h5>
        <p class="card-text"><span>Description: </span><span>{{$list->description}}</span></p>
        <p class="card-text"><span>Price: </span><span class="text-danger">{{$list->price}}</span></p>
        <p class="card-text"><span>Quantity: </span><span class="text-warning">{{$list->quantity}}</span></p>
       <form action="{{route('add_cart',$list -> id)}}" method="POST">
        @csrf
        <input type="number" name="quantity" id="" class="form-control w-25 mb-4 border-gray-200" value="1">
        <input type="submit" class="btn btn-success" value="+ Add to cart">
       </form>
    </div>
</div>

@endsection
