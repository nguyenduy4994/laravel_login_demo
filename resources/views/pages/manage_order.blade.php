<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <title>Gọi nước !!!</title>

    <style>
        body {
            padding-bottom: 20px;
        }
        
        .quantity-wrapper {
            width: 250px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="#">Nắng Việt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Gọi nước <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trợ giúp</a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="jumbotron">
            <h1 class="text-center">Nắng Việt | Gọi nước</h1>
            <div class="mt-3">
                <h4>1. Thông tin vận chuyển: <b>#{{ $orders->id }}</b></h4>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-6">Tên khách hàng: {{ $orders->name }}</div>  
                    <div class="col-md-6">Số điện thoại: 0{{ $orders->phone }}</div>
                </div>
                <div class="row"> <div class="col-md-12">Địa chỉ khách hàng: {{ $orders->address }}</div></div>
            </div>
            <div class="mt-3">
                    <h4>2. Đơn hàng: <b>#{{ $orders->id }}</b></h4>
                </div>
            <table class="mt-3 table">
                <thead>
                    <tr>
                        <td>Tên loại nước</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <a class="btn btn-lg btn-primary" href="{{ route('goi-nuoc') }}" role="button">Đặt ngay
                &raquo;</a>
        </div>
    </main>
</body>
</html>