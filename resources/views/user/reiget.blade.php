@extends('layout.layout')


@section('title', 'Đăng ký')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100 ">
        <form method="POST" class="border rounded b w-50 p-3 bg-dark-subtle" action="{{ route('register') }}">
          @csrf
            <h1 class="h3 mb-3 fw-normal">Create an Account</h1>
        
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" >
                <label for="name">Full Name</label>
                @error('name')
                    <span class="text-danger">{{$message}}</span> <br>
                @enderror
            </div>
        
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" >
                <label for="email">Email Address</label>
                @error('email')
                <span class="text-danger">{{$message}}</span>  <br>
            @enderror
            </div>
        
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                <label for="password">Password</label>
                @error('password')
                <span class="text-danger">{{$message}}</span>  <br>
            @enderror
            </div>
        
           
        
            <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
        </form>
        
    </div>

@endsection
