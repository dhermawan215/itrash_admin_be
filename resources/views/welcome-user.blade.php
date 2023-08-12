<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Itrash | Bank Sampah Digital</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('front-theme/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('front-theme/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('front-theme/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-theme/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('front-theme/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('front-theme/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('front-theme/assets/css/theme.css') }}" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="/"><img
                        class="d-inline-block align-top img-fluid" src="{{ asset('front-theme/logoweb.png') }}"
                        alt="" width="90" /></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page"
                                href="#header">Home</a></li>
                        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#Opportuanities">Visi</a></li>
                        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#invest">Berita</a></li>
                        <li class="nav-item px-2"><a class="nav-link fw-medium" href="#contact">Kontak </a></li>
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-lg btn-success bg-gradient order-0" href="{{ route('register') }}">Sign Up</a>
                    </form>
                </div>
            </div>
        </nav>
        <section class="py-0" id="header">
            <div class="bg-holder d-none d-md-block"
                style="background-image:url({{ asset('front-theme/3794722.jpg') }});background-position:right top;background-size:contain;">
            </div>
            <!--/.bg-holder-->

            <div class="bg-holder d-md-none"
                style="background-image:url({{ asset('front-theme/assets/img/illustrations/hero-bg.png') }});background-position:right top;background-size:contain;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row align-items-center min-vh-75 min-vh-lg-100">
                    <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                        <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Itrash <br
                                class="d-block d-lg-block" />Bank Sampah</h1>
                        <p class="mb-4 fs-1">Kami adalah bank sampah digital yang berfokus pada usaha pengelolaan limbah
                            sampah.</p>
                        <a class="btn btn-lg btn-success" href="#Opportuanities">Pelajari Lebih Jauh</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5" id="Opportuanities">
            <div class="bg-holder d-none d-sm-block"
                style="background-image:url({{ asset('front-theme/assets/img/illustrations/bg.png') }});background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto text-center mb-3">
                        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Masa Depan Baru</h5>
                        <p class="mb-5">Tukarkan sampahmu dan kita wujudkan lingkungan bersih dan sehat.</p>
                    </div>
                </div>
                <div class="row flex-center h-100">
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                                    <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                            src="{{ asset('front-theme/assets/img/icons/farmer.svg') }}" height="60"
                                            alt="" />
                                        <div class="card-body">
                                            <h6 class="fw-bold fs-1 heading-color">Komunitas</h6>
                                            <p class="mt-3 mb-md-0 mb-lg-2">Bersama komunitas, kita wujudkan lingkungan
                                                yang sehat dan bersih</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                                    <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                            src="{{ asset('front-theme/assets/img/icons/growth.svg') }}"
                                            height="60" alt="" />
                                        <div class="card-body">
                                            <h6 class="fw-bold fs-1 heading-color">Berkembang dengan sampah</h6>
                                            <p class="mt-3 mb-md-0 mb-lg-2">Setiap sampah yang disetorkan kami akan
                                                bayar sesuai jumlah berat sampah</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                                    <div class="text-center text-md-start card-hover"><img class="ps-3 icons"
                                            src="{{ asset('front-theme/assets/img/icons/planting.svg') }}"
                                            height="60" alt="" />
                                        <div class="card-body">
                                            <h6 class="fw-bold fs-1 heading-color">Dampak Sosial</h6>
                                            <p class="mt-3 mb-md-0 mb-lg-2">Lingkuangan bersih menjadikan tempat
                                                tinggal kita nyaman dan tentunya kesehatan membaik</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-5" id="invest">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 mb-3">
                        <div class="row">
                            <div class="col-lg-9 mb-3">
                                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Isu lingkungan</h5>
                                <p class="mb-5"></p>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="card text-white"><img class="card-img"
                                        src="{{ asset('front-theme/assets/img/gallery/short-terms.png') }}"
                                        alt="..." />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-center px-5 px-md-3 px-lg-5 bg-light-gradient">
                                        <h6 class="text-success pt-2">Berita</h6>
                                        <hr class="text-white" style="height:0.12rem;width:2.813rem" />
                                        <div class="pt-lg-3">
                                            <h6 class="fw-bold text-white fs-1 fs-md-2 fs-lg-3 w-xxl-50">Lingkungan
                                                bersih meningkatkan produktivitas</h6>

                                            <button class="btn btn-lg btn-light text-success" type="button">Baca
                                                selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="card text-white"><img class="card-img"
                                        src="{{ asset('front-theme/assets/img/gallery/fully-funded.png') }}"
                                        alt="..." />
                                    <div
                                        class="card-img-overlay d-flex flex-column justify-content-center px-5 px-md-3 px-lg-5 bg-light-gradient">
                                        <h6 class="text-success pt-2">Berita</h6>
                                        <hr class="text-white" style="height:0.12rem;width:2.813rem" />
                                        <div class="pt-lg-3">
                                            <h6 class="fw-bold text-white fs-1 fs-md-2 fs-lg-3 w-xxl-50">Menjaga
                                                Lingkungan Bersama</h6>

                                            <button class="btn btn-lg btn-light text-success" type="button">Baca
                                                selengkapnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <section class="py-0">
            <div class="bg-holder"
                style="background-image:url({{ asset('front-theme/assets/img/illustrations/how-it-works.png') }});background-position:center bottom;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="container-lg">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
                        <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">Bagaimana Cara Kerjanya?</h5>
                        <p class="mb-5 text-white">Dengan mengunduh aplikasi bank sampah Itrash, anda akan
                            berkontribusi dalam pengelolaan sampah terutama smapah rumah tangga, kami selaku pemilik
                            bank sampah akan memberikan kompensasi bagi anda yang menyetorkan sampah ke kami.</p>
                    </div>
                    <div class="col-sm-9 col-md-12 col-xxl-9">
                        <div class="theme-tab">
                            <ul class="nav justify-content-between">
                                <li class="nav-item" role="presentation"><a class="nav-link active fw-semi-bold"
                                        href="#bootstrap-tab1" data-bs-toggle="tab" data-bs-target="#tab1"
                                        id="tab-1"><span class="nav-item-circle-parent"><span
                                                class="nav-item-circle">01</span></span></a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link fw-semi-bold"
                                        href="#bootstrap-tab2" data-bs-toggle="tab" data-bs-target="#tab2"
                                        id="tab-2"><span class="nav-item-circle-parent"><span
                                                class="nav-item-circle">02</span></span></a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link fw-semi-bold"
                                        href="#bootstrap-tab3" data-bs-toggle="tab" data-bs-target="#tab3"
                                        id="tab-3"><span class="nav-item-circle-parent"><span
                                                class="nav-item-circle">03</span></span></a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link fw-semi-bold"
                                        href="#bootstrap-tab4" data-bs-toggle="tab" data-bs-target="#tab4"
                                        id="tab-4"><span class="nav-item-circle-parent"><span
                                                class="nav-item-circle">04</span></span></a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                    aria-labelledby="tab-1">
                                    <div class="row align-items-center my-6 mx-auto">
                                        <div class="col-md-6 col-lg-5 offset-md-1">
                                            <h3 class="fw-bold lh-base text-white">Download App.</h3>
                                        </div>
                                        <div class="col-md-5 text-white offset-lg-1">
                                            <p class="mb-0">Download App Itrash, dan daftarkan akun anda</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-2">
                                    <div class="row align-items-center my-6 mx-auto">
                                        <div class="col-md-6 col-lg-5 offset-md-1">
                                            <h3 class="fw-bold lh-base text-white">Upload sampah anda</h3>
                                        </div>
                                        <div class="col-md-5 text-white offset-lg-1">
                                            <p class="mb-0">Upload transaksi sampah anda di aplikasi, kami bantu
                                                ambil sampahnya</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-3">
                                    <div class="row align-items-center my-6 mx-auto">
                                        <div class="col-md-6 col-lg-5 offset-md-1">
                                            <h3 class="fw-bold lh-base text-white">Verifikasi.</h3>
                                        </div>
                                        <div class="col-md-5 text-white offset-lg-1">
                                            <p class="mb-0">Kami akan verifikasi data sampah kamu</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab-4">
                                    <div class="row align-items-center my-6 mx-auto">
                                        <div class="col-md-6 col-lg-5 offset-md-1">
                                            <h3 class="fw-bold lh-base text-white">Sukses</h3>
                                        </div>
                                        <div class="col-md-5 text-white offset-lg-1">
                                            <p class="mb-0">Kami bayar sampahmu langsung!.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="z-index-1 cta">

            <div class="container">
                <div class="row flex-center">
                    <div class="col-12">
                        <div class="card shadow h-100 py-5">
                            <div class="card-body text-center">
                                <h1 class="fw-semi-bold mb-2">Masa depan &nbsp;<span
                                        class="text-success">Lingkungan</span> &nbsp; ditangan mu</h1>
                                <h4 class="mb-4">Menabung sampah bersama kami!</h4>
                                <a class="btn btn-md btn-success px-6" href="#" role="button">Download
                                    App Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        <section class="py-0" id="contact">
            <div class="bg-holder"
                style="background-image:url({{ asset('front-theme/assets/img/illustrations/footer-bg.png') }});background-position:center;background-size:cover;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row justify-content-lg-between min-vh-75" style="padding-top:21rem">
                    <div class="col-6 col-sm-4 col-lg-auto mb-3">
                        <h6 class="mb-3 text-1000 fw-semi-bold">COMPANY </h6>
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">About Us</a>
                            </li>
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Team</a></li>
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Careers</a>
                            </li>
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-4 col-lg-auto mb-3">
                        <h6 class="mb-3 text-1000 fw-semi-bold">LEGAL </h6>
                        <ul class="list-unstyled mb-md-4 mb-lg-0">
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Privacy</a>
                            </li>
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Terms</a></li>
                            <li class="mb-3"><a class="text-700 text-decoration-none" href="#!">Security</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 col-lg-auto mb-3">


                    </div>
                    <div class="col-12 col-lg-auto mb-3">
                        <div class="card bg-success">
                            <div class="card-body p-sm-4">
                                <h5 class="text-white">Customer Service</h5>
                                <p class="mb-0 text-white">write email to us: <span
                                        class="text-white fs--1 fs-sm-1">info@itrash.com</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="text-300 mb-0" />
                <div class="row flex-center py-5">
                    <div class="col-12 col-sm-8 col-md-6 text-center text-md-start"> <a class="text-decoration-none"
                            href="#"><img class="d-inline-block align-top img-fluid"
                                src="{{ asset('front-theme/logoweb.png') }}" alt="" width="120" /></a>
                    </div>
                    <div class="col-12 col-sm-8 col-md-6">
                        <p class="fs--1 text-dark my-2 text-center text-md-end">&copy; Itrash&nbsp;

                            </svg>&nbsp;theme by&nbsp;<a class="text-dark" href="https://themewagon.com/"
                                target="_blank">ThemeWagon </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('front-theme/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('front-theme/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-theme/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('front-theme/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap"
        rel="stylesheet">
</body>

</html>
