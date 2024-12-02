@extends('admin.layout.layout')

@section('title', 'Oder List')


@section('content')

    <div class="card mt-3">
      <div class="card-body">
       
        <table class="table">
       @if (session('success'))
            <p class="alert alert-success mt-4">{{session('success')}}</p>
       @endif
          <thead>
              <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Email</th>
                  <th scope="col">Oder_id</th>
                 
             
              </tr>
          </thead>
          <tbody>
            @foreach($oder as $item)
            <tr>
              <th scope="row">{{$item -> id}}</th>
              <td>{{$item -> user_email}}</td>
              <td>{{$item -> oder_id}}</td>
            
          </tr>
            @endforeach
            
            
           
          </tbody>
         
      </table>
      {{ $oder -> links() }}
      </div>
       
    </div>

@endsection
