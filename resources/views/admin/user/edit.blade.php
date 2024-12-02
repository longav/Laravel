@extends('layout.layout')


@section('title', 'Đăng Nhập')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 ">
     


        <form class="border rounded b w-50 p-3 bg-dark-subtle" action="{{ route('postlogin') }}" method="POST">
           
            @csrf
     
            <h3>Thông tin tài khoản</h3>
            <div class="form-floating mb-3">
          <select class="form-select" name="role" id="">
                @foreach ($action as $item)
                        <option value="{{$item -> role}}" {{$item -> role == $user -> role ? 'selected' : ''}}>{{$item -> role}}</option>
                @endforeach
          </select>
            </div>
           


            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <a href="{{ route('register_view') }}" class="">Create new account!</a>
        </form>

    </div>

@endsection
