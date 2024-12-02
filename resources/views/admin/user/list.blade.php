@extends('admin.layout.layout')

@section('title', 'Product List')


@section('content')

    <div class="card">
      <div class="card-body">
       
        <table class="table">
       @if (session('success'))
            <p class="alert alert-success mt-4">{{session('success')}}</p>
       @endif
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($user as $item)
            <tr>
              <th scope="row">{{$item -> id}}</th>
              <td>{{$item -> 	name}}</td>
              <td>{{$item -> email }}</td>
             
              <td>{{$item -> role}}</td>
             
              <td><form action="{{route('user.ban',$item -> id)}}" method="POST">
               
                @csrf
                @if ($item -> status == 1)
                <button type="submit" onclick="return confirm('Bạn có chắc không ?')" class="btn btn-danger">Ban</button>
                @else
                <button type="submit" onclick="return confirm('Bạn có chắc không ?')" class="btn btn-warning">Unban</button>
                @endif
                </form>
              </td>
              {{-- <td><a href="{{route('user.edit',$item -> id)}}" class="btn btn-warning">Edit</a></td> --}}
          </tr>
            @endforeach
            
            
           
          </tbody>
         
      </table>
      {{ $user   -> links() }}
      </div>
       
    </div>

@endsection
