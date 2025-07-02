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
  <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="../assets/css/all.min.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="../assets/css/owl.carousel.css">
  <!-- magnific popup -->
  <link rel="stylesheet" href="../assets/css/magnific-popup.css">
  <!-- animate css -->
  <link rel="stylesheet" href="../assets/css/animate.css">
  <!-- mean menu css -->
  <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- responsive -->
  <link rel="stylesheet" href="../assets/css/responsive.css">
  <style>
    body{
        font-family: 'Josefin Sans';
    }
  </style>
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
        <!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <h1>SEE MORE DETAILS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($products as $product)
        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="single-product-img">
                            <img src="{{ asset('images/'.$product->image) }}" alt="">
                        </div>
                    </div>
                    <div style="font-family: 'Josefin Sans'" class="col-md-7">
                        <div class="single-product-content">
                            <h3 style="font-family: 'Josefin Sans', text-transform: capitalize">{{ $product -> name }}</h3>
                            <p style="font-family: 'Josefin Sans'" class="single-product-pricing"><span>Per Item</span>Rp. {{ $product -> price }}</p>
                            <p style="font-family: 'Josefin Sans' , text-align:justify">{{ $product -> desc }}</p>
                            <div class="single-product-form">
                                @auth
                                <a href="/chat/{{ $product->user_id }}" class="cart-btn">Chat Seller</a>
                                @endauth
                                @guest
                                <a href="/auth" class="cart-btn">Chat Seller</a>
                                @endguest
                                <p style="font-family: 'Josefin Sans'"><strong>Categories: </strong>
                                    @foreach($data as $item)
                                        @if ($product->category == $item->category_id)
                                        {{ $item->category_name }}</p>
                                        @endif
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end single product -->
        @auth
        <div class="container mb-5">
            <h4 style="font-family: 'Josefin Sans'">Tulis Ulasan:</h4>
            <form action="/product/review" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <div class="form-group">
                    <label>Rating (1-5):</label>
                    <input type="number" name="rating" class="form-control" min="1" max="5" required>
                </div>
                <div class="form-group">
                    <label>Review:</label>
                    <textarea name="review" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </form>
        </div>
        @endauth
        <!-- Review Section -->
<section class="container mt-5">
    <h4>Customer Reviews</h4>
    @forelse ($reviews as $review)
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">{{ $review->name }}</h5>
                <p class="card-text">Rating: {{ $review->rating }}/5</p>
                <p class="card-text">{{ $review->review_text }}</p>
                <small class="text-muted">{{ $review->created_at }}</small>
            </div>
        </div>
    @empty
        <p>Belum ada review untuk produk ini.</p>
    @endforelse
</section>


        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- end copyright -->
        
        <!-- jquery -->
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <!-- bootstrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- count down -->
        <script src="assets/js/jquery.countdown.js"></script>
        <!-- isotope -->
        <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
        <!-- waypoints -->
        <script src="assets/js/waypoints.js"></script>
        <!-- owl carousel -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- magnific popup -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- mean menu -->
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <!-- sticker js -->
        <script src="assets/js/sticker.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
    
    </body>