@extends('admin.layout.layout')

@section('title', 'Category List')


@section('content')

    <div class="card">
      <div class="card-body">
        <a href="{{route('category.create')}}" class="btn btn-primary">+ ADD</a>
        <table class="table">
       @if (session('success'))
            <p class="alert alert-success mt-4">{{session('success')}}</p>
       @endif
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($categories as $item)
            <tr>
              <th scope="row">{{$item -> id}}</th>
              <td>{{$item -> name}}</td>
              
              <td><form action="{{route('category.delete',$item -> id)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Bạn có chắc không ?')" class="btn btn-danger">Delete</button>
                </form>
              </td>
              <td><a href="{{route('category.edit',$item -> id)}}" class="btn btn-warning">Edit</a></td>
          </tr>
            @endforeach
            
            
           
          </tbody>
         
      </table>
      {{ $categories -> links() }}
      </div>
       
    </div>

@endsection
