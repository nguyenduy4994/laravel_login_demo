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
            <h1>Nắng Việt | Gọi nước</h1>
            <p class="lead">Ứng dụng gọi nước, hãy chọn món bên dưới, chọn số lượng và bấm Order để đặt hàng. Chúng tôi
                sẽ gọi ngay cho bạn khi nhận đơn hàng để xác nhận.</p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Đặt ngay
                &raquo;</a>
        </div>

        <div class="row">
            <div class="col-sm-12">

            <form action="{{ route('goi-nuoc-uong') }}" method="post">
                @csrf()
                <div class="row">
                    <div class="col-md-8">
                        <h2>Menu</h2>
                        <ul class="list-group">
                            @foreach($list as $product)
                            <li class="list-group-item" id="{{ $product->id }}">
                                <input type="text" hidden name="product[{{ $product->id }}][id]" value="{{ $product->id }}">
                                {{ $product->name }} - 
                                {{ number_format($product->price) }} vnđ
                                <div class="float-right quantity-wrapper">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" id="minus_{{ $product->id }}">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control text-center" name="product[{{ $product->id }}][quantity]" min="0" id="quantity_{{ $product->id }}" value="0">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="plus_{{ $product->id }}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                            <h2>Thông tin khách hàng</h2>
                            <div class="form-group">
                                <label for="txt-name">Họ và tên</label>
                                <input type="text" name="name" id="txt-name" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="txt-address">Địa chỉ</label>
                                <input type="text" name="address" id="txt-address" class="form-control" required value="">
                            </div>
                            <div class="form-group">
                                <label for="txt-phone">Số điện thoại</label>
                                <input type="text" name="phone" id="txt-phone" class="form-control" required value="">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    Đặt hàng <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>   
                        </div>
                    </div>                
                </form>
            </div>
        </div>
    </main>
</body>
<script type="text/javascript">
    $(function(){
        $('li').hover(function(){
            var id = $(this).attr('id');
            var quan = parseInt($('#quantity_'+ id).val());
            $('#plus_' + id).click(function(){
                quan = quan + 1;
                $('#quantity_' + id).val(quan);
            });

            $('#minus_' + id).click(function(){
                quan = quan - 1;
                if(parseInt(quan) > 0) {
                    $('#quantity_' + id).val(quan);
                }
                else {
                    $('#quantity_' + id).val(0);
                }
            });
        });
    });
</script>
</html>