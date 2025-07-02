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
  <link href="flex/css/style-index.css" rel="stylesheet">
  <link href="{{url('css/style.css')}}" rel="stylesheet">
  <link href="{{url('css/uikit.min.css')}}" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="{{url('js/uikit.min.js')}}"></script>
  <script src="{{url('js/uikit-icons.min.js')}}"></script>
  
  <title><?php echo $title?></title>
  </head>
  <body>
    <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="/welcome" class="logo d-flex align-items-center">
          <img src="flex/img/logo.png" alt="">
          <span style="margin-top: 8px; color:#4154f1">Polman Preneur</span>
        </a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="/welcome">Home</a></li>
            <li><a class="nav-link scrollto" href="/viewProduct">Product</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
  
    <!-- ======= Hero Section ======= -->
    <div class="container alert" style="margin-top: 75px">
      @include('alerts.success')
    </div>
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Polman Preneur</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">Sebuah platform e-commerce yang dapat mempermudah pemasaran produk yang ingin dijual oleh mahasiswa polman babel</h2>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Get Started</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </section><!-- End Hero -->
  
    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
  
        <div class="container" data-aos="fade-up">
          <div class="row gx-0">
  
            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3>About Us</h3>
                <h2>Lorem</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula sem, rutrum vel erat pharetra, semper pharetra nulla. Nam tincidunt porta mi, vel malesuada ex consectetur eu. Nunc id felis in leo iaculis gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce arcu ante, rhoncus in vestibulum eu, tincidunt et est. Duis interdum hendrerit cursus. Sed sed semper eros. In dapibus id ipsum sit amet luctus. In elit purus, ullamcorper nec elit ut, consectetur venenatis dui. Pellentesque semper at nisi a dictum. Nulla imperdiet lacus in tempus mattis. Fusce cursus rhoncus ligula, id maximus nisl rhoncus quis. Curabitur in sem et turpis malesuada ultricies. Praesent et neque non odio pharetra efficitur. Sed vulputate lacinia tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae
                </p>
                <div class="text-center text-lg-start">
                  <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Read More</span>
                  </a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="flex/img/about.jpg" class="img-fluid" alt="">
            </div>
  
          </div>
        </div>
  
      </section><!-- End About Section -->
  
      <!-- ======= Values Section ======= -->
      <section id="values" class="values">
  
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Our Goal</h2>
            <p>Tujuan Polman Preneur Hadir</p>
          </header>
  
          <div class="row">
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="box">
                <img src="flex/img/values-1.png" class="img-fluid" alt="">
                <h3>Menjadi media pembelajar e-commerce dan bisnis bagi mahasiswa</h3>
                 </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="box">
                <img src="flex/img/values-2.png" class="img-fluid" alt="">
                <h3>Meningkatkan penghasilan mahasiswa dengan bisnis e-commerce</h3>
                </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
              <div class="box">
                <img src="flex/img/values-3.png" class="img-fluid" alt="">
                <h3>Menjadi platform untuk para mahasiswa berjualan barang mereka</h3>
              </div>
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Values Section -->
  
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
  
          <div class="row gy-4">
  
            <div class="col-lg-4 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $activeCount }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Active User</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="count-box">
                <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $productCount }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Products</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="count-box">
                <i class="bi bi-people" style="color: #bb0852;"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $userCount }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>User</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Counts Section -->
  
      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
  
        <div class="container" data-aos="fade-up">

          <!-- Feature Icons -->
          <div class="row feature-icons" data-aos="fade-up">
            <h3>Feature</h3>
  
            <div class="row">
  
              <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                <img src="flex/img/features-3.png" class="img-fluid p-4" alt="">
              </div>
  
              <div class="col-xl-8 d-flex content">
                <div class="row align-self-center gy-4">
  
                  <div class="col-md-6 icon-box" data-aos="fade-up">
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Chat</h4>
                      <p>when using the chat feature you can send messages to all users or sellers to negotiate the price of the goods they sell</p>
                    </div>
                  </div>
  
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Buy and Sell
                      </h4>
                      <p>You can buy and sell on this platform by chatting with users related to the product</p>
                    </div>
                  </div>
  
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Profile</h4>
                      <p>You can customize your profile in real time</p>
                    </div>
                  </div>
  
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Filter Product</h4>
                      <p>You can filter what products you want based on the product category</p>
                    </div>
                  </div>
  
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Cash On Delivery</h4>
                      <p>after you negotiate with the seller you can make a payment when you receive the item</p>
                    </div>
                  </div>
  
                </div>
              </div>
  
            </div>
  
          </div><!-- End Feature Icons -->
  
        </div>
  
      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials">
  
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Testimonials</h2>
            <p>What they are saying about us</p>
          </header>
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <p>
                    Dulu saya cuma promosi lewat status WA, sekarang produk saya punya katalog resmi di kampus. Pembeli jadi makin percaya
                  </p>
                  <div class="profile mt-auto">
                    <img src="flex/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Aulia</h3>
                    <h4>Mahasiswa Teknik Mesin &amp; Pemilik @warkoplinglung</h4>
                  </div>
                </div>
              </div><!-- End testimonial item -->
              @foreach ($testimonials as $testimonial)
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <p>{{ Str::limit($testimonial->testimonials, 230) }}</p>
                  <div class="profile mt-auto">
                    <img src="flex/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>{{ $testimonial -> name }}</h3>
                    <h4>{{ $testimonial -> setLevel ? 'Admin' : 'User'; }}</h4>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
          @auth
            <div class="screen-body-item mt-5">
              <div class="app-form">
                <form class="form" method="post" action="userTestimonials">
                  @csrf
                  <div class="form-group w-100">
                    <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->user_id }}">
                    <input type="text" name="testimonials" class="app-form-control" placeholder="Feel Free To Give Us Testimonials?">
                  </div>
                  <div class="app-form-group buttons">
                    <button style="opacity :0;" class="app-form-button" type="submit">Send</button>
                  </div>
                </form>
              </div>
            </div>
          @endauth
        </div>
      </section><!-- End Testimonials Section -->
  
      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
  
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Meet Developer</h2>
            <p>Kenalan Dengan Developer PolmanPreneur</p>
          </header>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Abang Audric Devlin Fieryanto Armia</h4>
                  <span>Project Leader</span>
                  <p>PolmanPreneur dikembangkan oleh Abang Audric Devlin Fieryanto Armia, mahasiswa aktif Program Studi Teknologi Rekayasa Perangkat Lunak di Politeknik Manufaktur Negeri Bangka Belitung. Seluruh proses desain, perencanaan sistem, hingga implementasi dikembangkan secara mandiri menggunakan framework Laravel, Bootstrap, Blade, dan MySQL.
                    Audric menginisiasi platform ini sebagai bagian dari tugas proyek akhir sekaligus kontribusi nyata untuk mendukung budaya wirausaha di lingkungan kampus. Harapannya, PolmanPreneur menjadi langkah awal bagi digitalisasi UMKM mahasiswa Polman Babel.</p>
                </div>
              </div>
            </div>
        </div>
  
      </section><!-- End Developer Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
  
        <div class="container" data-aos="fade-up">
  
          <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </header>
  
          <div class="row gy-4">
  
            <div class="col-lg-6">
  
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>Jalan Nangnung Republik</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+62 812 3456 7890</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>polmanpreneur@polman-babel.ac.id</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>8:00AM - 17:00PM</p>
                  </div>
                </div>
              </div>
  
            </div>
  
            <div class="col-lg-6">
              <form action="/addContact" method="post" class="btn btn-primary" style="background-color: #faffff; border-style: solid; border-color: #faffff">
                @csrf
                <div class="row gy-4">
  
                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                  </div>
  
                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                  </div>
  
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                  </div>
  
                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                  </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
  
                </div>
              </form>
  
            </div>
  
          </div>
  
        </div>
  
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="flex/img/logo.png" alt="">
                <span style="margin-top:10px;">Polman Preneur</span>
              </a>
              <p></p>
            </div>
  
            <div class="col-lg-2 col-6 footer-links">
              <h4>Quick Links</h4>
              <ul>
                <li><a class="nav-link scrollto active" href="/welcome">Home</a></li>
            <li><a class="nav-link scrollto" href="/viewProduct">Product</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
              <h4>Contact Us</h4>
              <p>
                Jalan Nangnung Republik<br>
                Pangkalpinang, 33123<br>
                Indonesia <br><br>
                <strong>Email :</strong> polmanpreneur@polman-babel.ac.id<br>
              </p>
  
            </div>
  
          </div>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="flex/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="flex/vendor/aos/aos.js"></script>
    <script src="flex/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="flex/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="flex/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="flex/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="flex/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="flex/js/main.js"></script>
  
  </body>
  
</html>
<style>
.screen-body {
  display: flex;
  text-align: center;
}

.screen-body-item {
  flex: 1;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #012970;
  font-size: 26px;
}

.app-title:after {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  height: 2px;
  background: #012970;
}

.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: #012970;
}

.app-form-group.message {
  margin-top: 40px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  text-align: center;
  width: 50%;
  transform: translate(50%);
  background: none;
  border: none;
  border-bottom: 1px solid #012970;
  color: #012970;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: #012970;
  letter-spacing: 1px;
  opacity: 0.8;
}

.app-form-control:focus {
  border-bottom-color: #012970;
}
</style>