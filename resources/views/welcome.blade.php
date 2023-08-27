<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sijarney</title>
    <!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="img/logo.png" alt="Site logo" />
                            Sijarney
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse"
                            data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#top">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tm-section-2">Top Destinations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- .tm-top-bar -->

        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">
                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">
                                        Let's start your journey
                                    </h1>
                                    <img src="img/dots-3.png" alt="Dots" />
                                </div>
                            </div>
                            <!-- col-xs-12 -->
                        </div>
                        <div class="tm-banner-overlay"></div>
                    </div>
                    <!-- .container -->
                </div>
                <!-- .tm-container-outer -->
            </section>

            <section class="p-5 tm-container-outer tm-bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">
                            <h2 class="text-uppercase mb-4">
                                <strong>Perjalananmu</strong> adalah prioritas kami
                            </h2>
                            <p class="mb-4">
                                Nullam auctor, sapien sit amet lacinia euismod, lorem magna
                                lobortis massa, in tincidunt mi metus quis lectus. Duis nec
                                lobortis velit. Vivamus id magna vulputate, tempor ante eget,
                                tempus augue. Maecenas ultricies neque magna. Lorem ipsum
                                dolor, sit amet consectetur adipisicing elit. Nobis fuga
                                dolores dolor doloremque facere, incidunt.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="tm-container-outer" id="tm-section-2">
                <section class="tm-slideshow-section">
                    <div class="tm-slideshow">
                        <img src="img/tanjungtinggi1.png" alt="Image" />
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">Paling banyak dikunjungi di Bangka Belitung</h2>
                        <p>
                            Aenean in lacus nec dolor fermentum congue. Maecenas ut velit
                            pharetra, pharetra tortor sit amet, vulputate sem. Vestibulum mi
                            nibh, faucibus ac eros id, sagittis tincidunt velit. Proin
                            interdum ullamcorper faucibus. Ut mi nunc, sollicitudin non
                            pulvinar id, sagittis eget diam. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Tempore nulla quis commodi impedit
                            possimus accusantium quidem sequi. Fugit, assumenda ut. Quam
                            quod quasi ab inventore dolorum ea incidunt nesciunt magnam!
                        </p>
                    </div>
                </section>
                <section class="clearfix tm-slideshow-section tm-slideshow-section-reverse">
                    <div class="tm-right tm-slideshow tm-slideshow-highlight">
                        <img src="img/nusapenida1.png" alt="Image" />
                    </div>

                    <div class="tm-slideshow-description tm-slideshow-description-left tm-bg-highlight">
                        <h2 class="">Paling banyak dikunjungi di Bali</h2>
                        <p>
                            Vivamus in massa ullamcorper nunc auctor accumsan ac at arcu.
                            Donec sagittis mattis pharetra. Proin commodo, ante et volutpat
                            pulvinar, arcu arcu ullamcorper diam, id maximus sem tellus id
                            sem. Suspendisse eget rhoncus diam. Fusce urna elit, porta nec
                            ullamcorper id. Lorem, ipsum dolor sit amet consectetur
                            adipisicing elit. Maxime, quidem reiciendis dignissimos,
                            delectus reprehenderit esse facilis sapiente ad sint ullam
                            blanditiis ratione corporis minima, modi nemo impedit culpa?
                            Saepe, fugit!
                        </p>
                    </div>
                </section>
                <section class="tm-slideshow-section">
                    <div class="tm-slideshow">
                        <img src="img/kawahputih2.png" alt="Image" />
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">Paling banyak dikunjungi di Bandung</h2>
                        <p>
                            Donec nec laoreet diam, at vehicula ante. Orci varius natoque
                            penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. Suspendisse nec dapibus nunc, quis viverra metus. Morbi
                            eget diam gravida, euismod magna vel, tempor urna. Lorem, ipsum
                            dolor sit amet consectetur adipisicing elit. Magnam voluptatem
                            dolores aliquid vero consequatur explicabo mollitia, fuga quo
                            ratione perspiciatis. Delectus eveniet pariatur minus itaque
                            assumenda at ratione, praesentium quidem?
                        </p>
                    </div>
                </section>
            </div>
            <div class="tm-container-outer" id="tm-section-3">
                <ul class="nav nav-pills tm-tabs-links">
                    <li class="tm-tab-link-li">
                        <a href="#1a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/north-america.png" alt="Image" class="img-fluid" />
                            Bali
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#2a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/south-america.png" alt="Image" class="img-fluid" />
                            Yogyakarta
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#3a" data-toggle="tab" class="tm-tab-link active">
                            <img src="img/europe.png" alt="Image" class="img-fluid" />
                            Bangka Belitung
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#4a" data-toggle="tab" class="tm-tab-link">
                            <!-- Current Active Tab -->
                            <img src="img/asia.png" alt="Image" class="img-fluid" />
                            Lombok
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="#7a" data-toggle="tab" class="tm-tab-link">
                            <img src="img/antartica.png" alt="Image" class="img-fluid" />
                            Bandung
                        </a>
                    </li>
                </ul>
                <div class="tab-content clearfix">
                    <!-- Tab 1 -->
                    <div class="tab-pane fade" id="1a">
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/pantaikuta.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Pantai Kuta</h3>
                                    <p class="tm-text-highlight">Denpasar Bali</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.789.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/nusapenida.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Nusa Penida</h3>
                                    <p class="tm-text-highlight">Bali</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <div id="preload-hover-img"></div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.676.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/ubud.jpeg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Desa Ubud</h3>
                                    <p class="tm-text-highlight">Bali</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.457.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->

                    <!-- Tab 2 -->
                    <div class="tab-pane fade" id="2a">
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/borobudur.jpeg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Candi Borobudur</h3>
                                    <p class="tm-text-highlight">Megelang</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.415.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/sinden.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Pantai Sinden</h3>
                                    <p class="tm-text-highlight">Gunung kidul</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.385.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/Curugluweng.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Curug Luweng Sampang</h3>
                                    <p class="tm-text-highlight">Gunung Kidul</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.280.000</p>
                                    <p class="tm-recommended-price-link">Pasan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->

                    <!-- Tab 3 -->
                    <div class="tab-pane fade" id="3a">
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/pulaulengkuas.jpeg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Pulau Lengkuas</h3>
                                    <p class="tm-text-highlight">Kepulauan Bangka Belitung</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.950.0000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/tanjungtiggi.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Pulau Tanjung Tinggi</h3>
                                    <p class="tm-text-highlight">Kepulauan Bangka Belitun</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.1.300.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->

                    <!-- Tab 4 -->
                    <div class="tab-pane fade show active" id="4a">
                        <!-- Current Active Tab WITH "show active" classes in DIV tag -->
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/selongbelanak.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Pantai Selong Belanak</h3>
                                    <p class="tm-text-highlight">Nusa Tenggara Barat</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.1.455.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                            <div class="tm-recommended-place">
                                <img src="img/rinjani.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Gunung Rinjani</h3>
                                    <p class="tm-text-highlight">Nusa Tenggara Barat</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.755.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/LombokWildlifePark.jpg" alt="Image"
                                    class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Lombok Wildlifr park</h3>
                                    <p class="tm-text-highlight">Lombok Utara</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <div id="preload-hover-img"></div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.432.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->

                    <!-- Tab 5 -->
                    <div class="tab-pane fade" id="5a">
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/kawahputih.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Kawah Putih</h3>
                                    <p class="tm-text-highlight">Ciwidey</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.400.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/leuwijurig.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Leuwi Jurig</h3>
                                    <p class="tm-text-highlight">Bandung</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.250.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/sanghyang.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Sanghyang Heuleut</h3>
                                    <p class="tm-text-highlight">Cipatat/p></p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.345.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/tm-img-06.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Grand Resort Pasha</h3>
                                    <p class="tm-text-highlight">Fourth City</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">$580</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->
                    <!-- Tab 7 -->
                    <div class="tab-pane fade" id="7a">
                        <div class="tm-recommended-place-wrap">
                            <div class="tm-recommended-place">
                                <img src="img/sanghyang.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Sanghyang Heuleutt</h3>
                                    <p class="tm-text-highlight">Ciputat</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.345.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/leuwijurig.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Leuwi Jurig</h3>
                                    <p class="tm-text-highlight">Bandung</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.250.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>

                            <div class="tm-recommended-place">
                                <img src="img/kawahputih.jpg" alt="Image" class="img-fluid tm-recommended-img" />
                                <div class="tm-recommended-description-box">
                                    <h3 class="tm-recommended-title">Kawah Putih</h3>
                                    <p class="tm-text-highlight">Ciwidey</p>
                                    <p class="tm-text-gray">
                                        Sed egestas, odio nec bibendum mattis, quam odio hendrerit
                                        risus, eu varius eros lacus sit amet lectus. Donec blandit
                                        luctus dictum...
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="tm-recommended-price-box">
                                    <p class="tm-recommended-price">Rp.400.000</p>
                                    <p class="tm-recommended-price-link">Pesan Sekarang</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- tab-pane -->
                </div>
            </div>

            <div class="tm-container-outer tm-position-relative" id="tm-section-4">
                <div id="google-map"></div>
                <form action="index.html" method="post" class="tm-contact-form">
                    <div class="form-group tm-name-container">
                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"
                            required />
                    </div>
                    <div class="form-group tm-email-container">
                        <input type="email" id="contact_email" name="contact_email" class="form-control"
                            placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="contact_subject" name="contact_subject" class="form-control"
                            placeholder="Subject" required />
                    </div>
                    <div class="form-group">
                        <textarea id="contact_message" name="contact_message" class="form-control" rows="9"
                            placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary tm-btn-primary tm-btn-send text-uppercase">
                        Send Message Now
                    </button>
                </form>
            </div>
            <!-- .tm-container-outer -->

            <footer class="tm-container-outer">
                <p class="mb-0">
                    Copyright © <span class="tm-current-year">2018</span> Your Company .
                    Designed by
                    <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template Mo</a>
                </p>
            </footer>
        </div>
    </div>
    <!-- .main-content -->

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/popper.min.js"></script>
    <!-- https://popper.js.org/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/datepicker.min.js"></script>
    <!-- https://github.com/qodesmith/datepicker -->
    <script src="js/jquery.singlePageNav.min.js"></script>
    <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="slick/slick.min.js"></script>
    <!-- http://kenwheeler.github.io/slick/ -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <!-- https://github.com/flesler/jquery.scrollTo -->
    <script>
    /* Google Maps
        ------------------------------------------------*/
    var map = "";
    var center;

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(37.769725, -122.462154),
            scrollwheel: false,
        };

        map = new google.maps.Map(
            document.getElementById("google-map"),
            mapOptions
        );

        google.maps.event.addDomListener(map, "idle", function() {
            calculateCenter();
        });

        google.maps.event.addDomListener(window, "resize", function() {
            map.setCenter(center);
        });
    }

    function calculateCenter() {
        center = map.getCenter();
    }

    function loadGoogleMap() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src =
            "https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&" +
            "callback=initialize";
        document.body.appendChild(script);
    }

    /* DOM is ready
      ------------------------------------------------*/
    $(function() {
        // Change top navbar on scroll
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 100) {
                $(".tm-top-bar").addClass("active");
            } else {
                $(".tm-top-bar").removeClass("active");
            }
        });

        // Smooth scroll to search form
        $(".tm-down-arrow-link").click(function() {
            $.scrollTo("#tm-section-search", 300, {
                easing: "linear"
            });
        });

        // Date Picker in Search form
        var pickerCheckIn = datepicker("#inputCheckIn");
        var pickerCheckOut = datepicker("#inputCheckOut");

        // Update nav links on scroll
        $("#tm-top-bar").singlePageNav({
            currentClass: "active",
            offset: 60,
        });

        // Close navbar after clicked
        $(".nav-link").click(function() {
            $("#mainNav").removeClass("show");
        });

        // Slick Carousel
        $(".tm-slideshow").slick({
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });

        loadGoogleMap(); // Google Map
        $(".tm-current-year").text(new Date().getFullYear()); // Update year in copyright
    });
    </script>
</body>

</html>