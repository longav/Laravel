@extends('admin.layout.layout')

@section('title', 'Product List')


@section('content')

    <div class="card">
      <div class="card-body">
        <a href="{{route('products.create')}}" class="btn btn-primary">+ ADD</a>
        <table class="table">
       @if (session('success'))
            <p class="alert alert-success mt-4">{{session('success')}}</p>
       @endif
          <thead>
              <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Img_thumbnail</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Category</th>
                  <th scope="col" colspan="2" class="text-center">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($list as $item)
            <tr>
              <th scope="row">{{$item -> id}}</th>
              <td>{{$item -> title}}</td>
              <td>{{$item -> description}}</td>
              <td><img src="{{Storage::url($item -> img_thumbnail)}}"  class="w-50" alt="{{$item -> img_thumbnail}}"></td>
              <td>{{$item -> price}}</td>
              <td>{{$item -> quantity}}</td>
              <td>{{$item -> category -> name}}</td>
              <td><form action="{{route('products.delete',$item -> id)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Bạn có chắc không ?')" class="btn btn-danger">Delete</button>
                </form>
              </td>
              <td><a href="{{route('products.edit',$item -> id)}}" class="btn btn-warning">Edit</a></td>
          </tr>
            @endforeach
            
            
           
          </tbody>
         
      </table>
      {{ $list -> links() }}
      </div>
       
    </div>

@endsection
