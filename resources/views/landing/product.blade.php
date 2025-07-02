<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
  <link href="flex/vendor/aos/aos.css" rel="stylesheet">
  <link href="flex/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="flex/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="flex/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="flex/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="flex/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="flex/css/style-product.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title><?php echo $title?></title>
  </head>
  <body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/welcome" class="logo d-flex align-items-center">
            <span>Polman Preneur</span>
            </a>
            <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/welcome">Home</a></li>
                <li><a class="nav-link scrollto active" href="/viewProduct">Product</a></li>
                <li><a class="nav-link scrollto" href="/.#about">About Us</a></li>
                <li><a class="nav-link scrollto" href="/.#contact">Contact</a></li>
                @auth
                <li class="dropdown"><a href="#" class="nav-link">Hi, {{ auth()->user()->name }}</a>
                    <ul>
                    <li><a href="/dashboard" class="nav-link mt-3">Dashboard</a></li>
                    <li class="nav-link">
                        <form action="/logout" method="POST" id="log">
                        @csrf
                        <a onclick="document.getElementById('log').submit()" class="nav-link" >Log Out</a>
                        </form>
                    </li>
                    </ul>
                </li>
                @else
                <li class="dropdown"><a href="#" class="nav-link">be a part of us?</a>
                    <ul>
                    <li><a href="/auth" class="nav-link mt-3">Login</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </div>
    </header>
    <div class="container" style="margin-top: 150px;">
        <form action="/filter" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="category">Filter</label>
            <select id="category" name="category" onchange="submit();">
                <option value="1" selected>-</option>
                @foreach ($data as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_id}} - {{ $category->category_name}}</option>
                @endforeach
            </select>
        </form><hr>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img class="img-{{ $product->product_id }}" src="{{ asset('images/'.$product->image) }}">
                            </a>
                            <ul class="product-links">
                                @auth
                                <li><a href="/chat/{{ $product->user_id }}"><i class="fa fa-comment"></i></a></li>
                                @endauth
                                <li><a href="{{url('/detailProduct',$product->product_id)}}"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="price">{{ $product->price }}</div>
                            <h3 class="title"><a href="#">{{ $product ->name }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </body>
</html>
