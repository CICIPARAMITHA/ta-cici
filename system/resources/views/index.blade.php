<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smart Plant</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{url('public')}}/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('public/assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{url('public/assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('public/assets')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('public/assets')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow bg-light fadeIn" data-wow-delay="0.1s">

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0 mt-2">SMART GARDEN</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{url('/')}}" class="nav-item nav-link active">Beranda</a>

                    <a href="{{url('login')}}" class="nav-item nav-link">Masuk</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                   <!--  <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a> -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{url('public')}}/assets/img/wall-tomat.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-12">
                                    <h1 class="display-2 mb-5 animated slideInDown text-white">SMART GARDEN TOMAT</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{url('public')}}/assets/img/wall-tomat2.jpeg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-12">
                                    <h1 class="display-2 mb-5 animated slideInDown text-white">KEBUN TOMAT  PINTAR</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<!-- Carousel End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{url('public')}}/assets/img/tentang.png">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Manfaat Buah Tomat Untuk Kesehatan</h1>
                <p class="mb-4">Buah tomat memiliki manfaat yang baik untuk kesehatan, seperti menjadi sumber vitamin dan mineral, mengandung antioksidan likopen, tinggi serat, rendah kalori, menjaga kesehatan jantung, dan mendukung kesehatan mata.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon my-5 mb-3 py-6">
    <div class="container">
        <div class="section-header mt-3 text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3 mt-3">Teknik Budidaya Tomat</h1>
            <p>Dasar-dasar teknik budidaya tomat</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{url('public')}}/assets/img/icon-1.png" alt="">
                    <h4 class="mb-3">Pembibitan</h4>
                    <p class="mb-4">Saat melakukan pembibitan, ada beberapa kriteria yang harus dipenuhi. Pertama, pilihlah biji yang utuh, tidak cacat maupun luka karena biasanya sulit untuk tumbuh. Kedua, pilihlah biji yang sehat, yakni biji yang tidak menunjukkan serangan hama maupun penyakit. Ketiga, pastikan benih atau biji terbebas dari kotoran</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{url('public')}}/assets/img/icon-2.png" alt="">
                    <h4 class="mb-3">Persiapan Lahan</h4>
                    <p class="mb-4">Pengolahan tanah untuk tanaman tomat dilakukan dengan melakukan pembersihan lahan dari tanaman-tanaman liar dan pembajakan tanah.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{url('public')}}/assets/img/icon-3.png" alt="">
                    <h4 class="mb-3">Perawatan</h4>
                    <p class="mb-4">Bagaimana cara merawat tomat dengan baik?
                    Jaga suhunya dengan tetap menyiraminya dua kali sehari, ketika pagi dan sore. Namun, jangan siram tomat secara berlebihan karena tomat tidak tahan dengan genangan air dan rentan kekurangan oksigen.</p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Nilai Sensor</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{url('public')}}/assets/img/blog-1.jpg" alt="">
                <div class="bg-light p-4">
                    <div class="d-block h5 lh-base mb-4" href="">
                        <center>
                            <h3>Kelembaban Tanah </h3><br>
                            <h1 id="soil"> {{$nilai->soil}} pH</h1>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" src="{{url('public')}}/assets/img/blog-2.jpg" alt="">
                <div class="bg-light p-4">
                   <div class="d-block h5 lh-base mb-4" href="">
                    <center>
                        <h3>Temperatur Ruang </h3><br>
                        <h1 id="temperatur"> {{$nilai->temperatur}}  <sup>o</sup>C</h1>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <img class="img-fluid" src="{{url('public')}}/assets/img/blog-3.jpg" alt="">
            <div class="bg-light p-4">
                <div class="d-block h5 lh-base mb-4" href="">
                    <center>
                        <h3>Kelembaban Ruang  </h3><br>
                        <h1 id="humidity"> {{$nilai->humidity}}  RH</h1>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Blog End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <center>
                <h1 class="fw-bold text-primary mb-4">Smart Garden</h1>
                <img width="30%" src="{{url('public')}}/assets/img/wall-tomat2.jpeg" alt="Image">
            </center>

        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Smart Garden</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a href="#">Politeknik Negeri Ketapang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

    function soil(){
        $('#soil').load("{{url('/')}}" + ' #soil');
    }

    function temperatur(){
        $('#temperatur').load("{{url('/')}}" + ' #temperatur');
    }

    function humidity(){
        $('#humidity').load("{{url('/')}}" + ' #humidity');
    }


    setInterval( ()=>{
        soil();
        temperatur();
        humidity();
    }, 2000);




</script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('public/assets')}}/lib/wow/wow.min.js"></script>
<script src="{{url('public/assets')}}/lib/easing/easing.min.js"></script>
<script src="{{url('public/assets')}}/lib/waypoints/waypoints.min.js"></script>
<script src="{{url('public/assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{url('public/assets')}}/js/main.js"></script>
</body>

</html>