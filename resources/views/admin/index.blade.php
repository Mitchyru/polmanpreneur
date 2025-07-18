<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Canonical SEO -->
        <!--  Social tags      -->
        <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, Black dashboard Laravel bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
        <meta name="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Black Dashboard Laravel by Creative Tim">
        <meta itemprop="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Black Dashboard Laravel by Creative Tim">
        <meta name="twitter:description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244">
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Black Dashboard Laravel by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://black-dashboard-laravel.creative-tim.com/" />
        <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244" />
        <meta property="og:description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
        <meta property="og:site_name" content="Creative Tim" />
        <title>Dashboard</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
        <!-- End Google Tag Manager -->
    </head>
<body class="">
            <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
                <div class="wrapper">
                        <div class="sidebar">
                                <div class="sidebar-wrapper">
                                    <div class="logo">
                                        <a href="/welcome" style="font-size: 28px; font-weight: 525; text-align: center;" class="simple-text logo-normal">{{ __('E-WISH') }}</a>
                                    </div>
                                    <ul class="nav">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <i class="tim-icons icon-chart-pie-36"></i>
                                                <p style="margin-top: 2px;">{{ __('Dashboard') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                                <i class="tim-icons icon-badge" ></i>
                                                <p class="nav-link-text" style="margin-top: 2.5px;">{{ __('User Setting') }}</p>
                                                <b class="caret mt-1"></b>
                                            </a>
                            
                                            <div class="collapse show" id="laravel-examples">
                                                <ul class="nav pl-4">
                                                    <li >
                                                        <a href="{{ route('profile.edit')  }}">
                                                            <i class="tim-icons icon-single-02"></i>
                                                            <p style="margin-top: 3px;">{{ __('User Profile') }}</p>
                                                        </a>
                                                    </li>
                                                    @if (Auth::user() && Auth::user()->setLevel == '1')
                                                    <li class="active">
                                                        <a href="{{ route('admin.index')  }}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p style="margin-top: 3px;">{{ __('User Management') }}</p>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @if (Auth::user() && Auth::user()->setSeller == '1')
                                                    <li>
                                                        <a href="{{url('/yourProduct',Auth::user()->user_id)}}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p style="margin-top: 3.5px;">{{ __('Your Product') }}</p>
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                        @if (Auth::user() && Auth::user()->setLevel == '1')
                                        <li>
                                            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                                <i class="tim-icons icon-book-bookmark" ></i>
                                                <p class="nav-link-text" style="margin-top: 2.5px;">{{ __('Approval') }}</p>
                                                <b class="caret mt-1"></b>
                                            </a>
                                            <div class="collapse show" id="laravel-examples">
                                                <ul class="nav pl-4">
                                                    <li>
                                                        <a href="{{ route('userApproval')  }}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p style="margin-top: 3px;">{{ __('User Approval') }}</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('productApproval')  }}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p style="margin-top: 3px;">{{ __('Product Approval') }}</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('letterApproval')  }}">
                                                            <i class="tim-icons icon-bullet-list-67"></i>
                                                            <p style="margin-top: 3px;">{{ __('Letter Approval') }}</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="{{ route('allProduct') }}">
                                                <i class="tim-icons icon-bag-16"></i>
                                                <p>{{ __('Product') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/category">
                                                <i class="tim-icons icon-bag-16"></i>
                                                <p>{{ __('Category') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('pages.testimonials') }}">
                                                <i class="tim-icons icon-align-center"></i>
                                                <p>{{ __('Testimonial') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('chat') }}">
                                                <i class="tim-icons icon-chat-33"></i>
                                                <p>{{ __('Chat') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/contact">
                                                <i class="tim-icons icon-chat-33"></i>
                                                <p>{{ __('Contact') }}</p>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            
            <div class="main-panel">
                    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                            <div class="container-fluid">
                                <div class="navbar-wrapper">
                                    <div class="navbar-toggle d-inline">
                                        <button type="button" class="navbar-toggler">
                                            <span class="navbar-toggler-bar bar1"></span>
                                            <span class="navbar-toggler-bar bar2"></span>
                                            <span class="navbar-toggler-bar bar3"></span>
                                        </button>
                                    </div>
                                    <a class="navbar-brand" href="#">{{ $page ?? __('USER MANAGEMENT') }}</a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                    <span class="navbar-toggler-bar navbar-kebab"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="dropdown nav-item">
                                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                                <div class="photo">
                                                    <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                                                </div>
                                                <b class="caret d-none d-lg-block d-xl-block"></b>
                                                <p class="d-lg-none">{{ __('Log out') }}</p>
                                            </a>
                                            <ul class="dropdown-menu dropdown-navbar">
                                                <li class="nav-link">
                                                    <a  style="text-align:center" href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <a style="text-align:center" href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                                                </li>
                                                <li class="nav-link">
                                                    <form action="/logout" method="POST" id="log">
                                                      @csrf
                                                     <a style="color: red; text-align:center" onclick="document.getElementById('log').submit()" class="nav-link dropdown-item" >{{ __('Log out') }}</a>
                                                     </form>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="separator d-lg-none"></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                                            <i class="tim-icons icon-simple-remove"></i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
          </button>
        </div>
    </div>
</div>
</div>
<div class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                </div>
            </div>
            <form class="form mb-4 mt-2" method="get" action="{{ route('searchUser') }}">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                      <div class="form">
                        <input type="search" name="search" class="form-control form-input" placeholder="Search...">
                      </div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class="text-primary" style="text-align: center">
                            <tr>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Level</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tbody style="text-align: center">
                            <tr>
                                <td>{{ $user -> nim }}</td>
                                <td style="text-transform: capitalize;">{{ $user -> name }}</td>
                                <td><a href="mailto:{{ $user -> email }}">{{ $user -> email }}</a></td>
                                <td>{{ $user -> notelp ?? "-"}}</td>
                                <td>{{ $user -> setLevel ? 'Admin' : 'User'; }}</td>
                                <td>{{ $user -> setSeller ? 'Yes' : 'No'; }}</td>
                                <td>{{ $user -> setStatus ? 'Active' : 'Inactive'; }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a>
                                                <form action="{{route('user.destroy', $user->nim)}}" method="POST">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </form>
                                            </a>
                                            <a>
                                                <?php if($user->setStatus == 1){ ?> 
                                                    <a href="{{url('/updateStatus',$user->nim)}}" class="dropdown-item">Inactive</a>
                                                  <?php }else{ ?> 
                                                    <a href="{{url('/updateStatus',$user->nim)}}" class="dropdown-item">Active</a>
                                                <?php } ?>
                                            </a>
                                           <a>
                                                 <?php if($user->setLevel == '1'){ ?> 
                                                    <a href="{{url('/updateLevel',$user->nim)}}" class="dropdown-item">Set User</a>
                                                  <?php }else{ ?> 
                                                    <a href="{{url('/updateLevel',$user->nim)}}" class="dropdown-item">Set Admin</a>
                                                  <?php } ?>
                                              </a>
                                              @if($user->setLevel == '0')
                                              <a>
                                                <?php if($user->setSeller == '1'){ ?> 
                                                    <a href="{{url('/updateSeller',$user->nim)}}" class="dropdown-item">Drop Seller</a>
                                                  <?php }else{ ?> 
                                                    <a href="{{url('/updateSeller',$user->nim)}}" class="dropdown-item">Set Seller</a>
                                                  <?php } ?>
                                              </a>
                                              @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
<script src="{{ asset('black') }}/js/core/popper.min.js"></script>
<script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!-- Chart JS -->
{{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
<!--  Notifications Plugin    -->
<script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

<script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
<script src="{{ asset('black') }}/js/theme.js"></script>

@stack('js')

<script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {
                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }
            });

            $('.light-badge').click(function() {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function() {
                $('body').removeClass('white-content');
            });
        });
    });
</script>
@stack('js')
<script>
// Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
    }(window,
    document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    try {
    fbq('init', '111649226022273');
    fbq('track', "PageView");
    } catch (err) {
    console.log('Facebook Track Error:', err);
    }
</script>
<noscript>
<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
</noscript>
</body>
</html>
