<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white">Trang chủ</a></li>
                    <li><a href="{{ route('list_cate') }}" class="nav-link px-2 text-white">Danh sách</a></li>
                    <li><a href="{{ route('cart') }}" class="nav-link px-2 text-white">Giỏ hàng</a></li>

                </ul>

                <div class="form">
                    <form class="col col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex" action="{{ route('search') }}"
                        method="POST" role="search">
                        @csrf
                        <input type="search" class="form-control form-control-dark text-bg-dark"
                            placeholder="Search..." aria-label="Search" name="search">



                        <button type="submit" class="btn btn-warning ms-3">Search</button>
                    </form>
                </div>

                <div class="text-end">
                    @if (Auth::user())
                        <span class=" align-items-center">Welcome, {{ Auth::user()->name }}!</span>
                    @else
                    <a href="{{route('login_view')}}" class="btn btn-info ms-3">Login</a>
                    
                    @endif
                    <a href="{{route('logout')}}" class="btn btn-secondary ms-3">Logout</a>



                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid d-flex flex-row">

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Danh sách</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                @foreach ($categories as $item)
                    <li>
                        <a href="{{ route('list_product', $item->id) }}" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>


        </div>
        <div class="container">
            @yield('content')
        </div>

    </div>

    <footer class="bg-warning p-2 text-center">ASM 1</footer>
</body>

</html>
