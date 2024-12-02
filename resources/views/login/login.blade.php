@extends('layout.layout')


@section('title', 'Đăng Nhập')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 ">
     


        <form class="border rounded b w-50 p-3 bg-dark-subtle" action="{{ route('postlogin') }}" method="POST">
            @if (session('success'))
            <div class="alert alert-danger">
                <span class="">{{ session('success') }}</span> <br>
            </div>
           
        @endif
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>


            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <a href="{{ route('register_view') }}" class="">Create new account!</a>
        </form>

    </div>

@endsection
