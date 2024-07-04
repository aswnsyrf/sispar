<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Builder Max</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/asset/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/asset/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/asset/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/asset/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/asset/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;800&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- header top section start -->
    <div class="header_top_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header_top_main">
                        <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                                +62-823-3304-5787</a></div>
                        <div class="call_text_2"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>
                                aswnsyrf@gmail.com</a></div>
                        <div class="call_text_1"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                SUMBAWA, NTB, INDONESIA</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section start -->
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="index.html"><img src="/asset/images/logo.png"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="projects.html">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="testimonial.html">Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>

                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_text">
                            <ul class="navbar-nav ml-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item" href="{{ route('profil.index') }}">Profil &
                                                aktivitas</a>


                                        </div>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </form>

                    <style>
                        .dropdown-menu {
                            background-color: transparent !important;
                            border: none;
                        }
                    </style>


                    {{-- <form class="form-inline my-2 my-lg-0">
                        <div class="login_text">
                            <ul>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                                    </li>
                                @endauth
                            </ul>
                        </div> --}}


                    <div class="quote_btn"><a href="#">Get A Quote</a></div>
                    </form>
                </div>
            </nav>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                        <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                            bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                            dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                            keanekaragaman budaya yang kaya akan tradisi. </p>
                                        <div class="btn_main">
                                            <div class="started_text active"><a href="#">Contact US</a></div>
                                            <div class="started_text"><a href="#">About Us</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                        <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                            bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                            dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                            keanekaragaman budaya yang kaya akan tradisi. </p>
                                        <div class="btn_main">
                                            <div class="started_text active"><a href="#">Contact US</a></div>
                                            <div class="started_text"><a href="#">About Us</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                        <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                            bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                            dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                            keanekaragaman budaya yang kaya akan tradisi. </p>
                                        <div class="btn_main">
                                            <div class="started_text active"><a href="#">Contact US</a></div>
                                            <div class="started_text"><a href="#">About Us</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!-- banner section end -->
    </div>






    <style>
        .custom-dropdown-menu {
            background-color: transparent !important;
            border: none;
        }
    </style>





    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                    <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                        bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                        dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                        keanekaragaman budaya yang kaya akan tradisi. </p>
                                    <div class="btn_main">
                                        <div class="started_text active"><a href="#">Contact US</a></div>
                                        <div class="started_text"><a href="#">About Us</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                    <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                        bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                        dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                        keanekaragaman budaya yang kaya akan tradisi. </p>
                                    <div class="btn_main">
                                        <div class="started_text active"><a href="#">Contact US</a></div>
                                        <div class="started_text"><a href="#">About Us</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">NUSA TENGGARA BARAT</h1>
                                    <p class="banner_text">Nusa Tenggara Barat adalah provinsi yang terletak di
                                        bagian barat Nusa Tenggara, Indonesia. Daerah ini kaya akan keindahan alam,
                                        dengan pantai-pantai eksotis, gunung-gunung yang menjulang tinggi, serta
                                        keanekaragaman budaya yang kaya akan tradisi. </p>
                                    <div class="btn_main">
                                        <div class="started_text active"><a href="#">Contact US</a></div>
                                        <div class="started_text"><a href="#">About Us</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="services_taital">Our Services</h1>
                    <p class="services_text_1">ssages of Lorem Ipsum available, but the majority have suffered
                        alteration</p>
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->
    <!-- about sectuion start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="about_taital">About Us</h1>
                    <p class="about_text">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour, or randomised words which
                        don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need
                        to be sure there isn't anything embarrassing hidden in the middle of text. All </p>
                    <div class="read_bt_1"><a href="#">Read More</a></div>
                </div>
                <div class="col-md-6">
                    <div class="about_img">
                        <div class="video_bt">
                            <div class="play_icon"><img src="images/play-icon.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about sectuion end -->
    <!-- projects section start -->
    <div class="projects_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="projects_taital">DESTINASI</h1>
                </div>
            </div>
        </div>

        <div class="projects_section_2 layout_padding">
            <div class="container">
                <div class="pets_section">
                    <div class="pets_section_2">
                        <div class="row">
                            @forelse ($destinasi_wisata as $row)
                                <div class="col-md-4">
                                    <div class="container_main">
                                        <a href="{{ route('detailwisata.show', ['id' => $row->id]) }}">
                                            <img src="/images/{{ $row->image }}" alt="{{ $row->name }}"
                                                class="image">
                                            <div class="overlay">
                                                <div class="text">
                                                    <h4 class="some_text"><i class="fa fa-link"
                                                            aria-hidden="true"></i></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="project_main">
                                        <h2 class="work_text">{{ $row->name }}</h2>
                                        <p class="dummy_text">
                                            {{ \Illuminate\Support\Str::limit($row->deskripsi, 200, $end = '...') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="col">
                                    <div class="alert alert-danger">
                                        Data destinasi wisata masih kosong.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- projects section end -->

    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="contact_taital">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-6">
                        <form action="">
                            <div class="mail_section_1">
                                <input type="text" class="mail_text" placeholder="Name" name="Name">
                                <input type="text" class="mail_text" placeholder="Phone Number"
                                    name="Phone Number">
                                <input type="text" class="mail_text" placeholder="Email" name="Email">
                                <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                                <div class="send_bt"><a href="#">SEND</a></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 padding_left_15">
                        <div class="contact_img"><img src="images/contact-img.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map_main">
            <div class="map-responsive">
                <iframe
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                    width="600" height="600" frameborder="0" style="border:0; width: 100%;"
                    allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <!-- contact section end -->
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location_text">
                        <ul>
                            <li>
                                <a href="#"><span class="padding_15"><i class="fa fa-mobile"
                                            aria-hidden="true"></i></span> <br>Call +01 1234567890</a>
                            </li>
                            <li class="active">
                                <a href="#"><span class="padding_15"><i class="fa fa-envelope"
                                            aria-hidden="true"></i></span> <br>demo@gmail.com</a>
                            </li>
                            <li>
                                <a href="#"><span class="padding_15"><i class="fa fa-map-marker"
                                            aria-hidden="true"></i></span> <br>Location</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer_section_2">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="useful_text">QUICK LINKS</h2>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="projects.html">Projects</a></li>
                                <li><a href="testimonial.html">Testimonial</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="useful_text">Work Portfolio</h2>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using Lorem</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="useful_text">SIGN UP TO OUR NEWSLETTER</h2>
                        <div class="form-group">
                            <textarea class="update_mail" placeholder="Enter Your Email" rows="5" id="comment" name="Enter Your Email"></textarea>
                            <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social_icon">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright_text">2019 All Rights Reserved. Design by <a href="https://html.design"
                            rel="nofollow">HTML.DESIGN</a> Distribution by <a
                            href="https://themewagon.com">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="/asset/js/jquery.min.js"></script>
    <script src="/asset/js/popper.min.js"></script>
    <script src="/asset/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/js/jquery-3.0.0.min.js"></script>
    <script src="/asset/js/plugin.js"></script>









</body>

</html>
