@extends('frontend.partials.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="">
        {{-- <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Welcome to <span class="text-danger">StarfitIDN</span></h1>
            <h2>Kami menciptakan pengalaman olahraga yang tak terlupakan .</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div> --}}
        <div class="row m-0">
            <div class="col-md-12">
                <div id="carouselExample" class="carousel slide justify-content-center align-items-center">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/carousel/banner-1.jpeg" class="d-block w-100" alt="banner">
                        </div>
                        <div class="carousel-item">
                            <img src="images/carousel/banner-2.jpeg" class="d-block w-100" alt="banner">
                        </div>
                        <div class="carousel-item">
                            <img src="images/carousel/banner-3.jpeg" class="d-block w-100" alt="banner">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container mt-5 pt-2">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('images/about.svg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>About Us</h3>
                        <p>
                            Kami adalah penyelenggara acara olahraga yang berdedikasi untuk menciptakan pengalaman yang tak
                            terlupakan. Dengan keahlian dalam merancang dan mengelola berbagai event, kami memastikan setiap
                            acara berlangsung dinamis dan penuh energi. Dari kompetisi lokal hingga turnamen besar, kami
                            mengurus semua detail agar setiap peserta dan penonton menikmati momen luar biasa. Bergabunglah
                            dengan kami dan rasakan semangat olahraga yang sejati!
                        </p>
                        <div>
                            <p class="mt-5">
                                <a href="#about" class="btn-get-started scrollto">Join Partner</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15423" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Total Peserta</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="92" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Event Terselenggara</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Partnership terjalin</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="3402" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Peserta Terakhir</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Counts Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="event" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>DAFTAR EVENT</h2>
                </div>

                <div class="row portfolio-container">

                    @foreach ($events as $event)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                            <div class="portfolio-wrap">
                                <figure>
                                    <img src="{{ asset('storage/' . $event->poster) }}" class="img-fluid" alt="">
                                    <a href="{{ asset('storage/' . $event->poster) }}" data-gallery="portfolioGallery"
                                        class="link-preview portfolio-lightbox btn btn-outline-primary" title="Preview"><i
                                            class="bx bx-show"></i></a>
                                    {{-- <a href="portfolio-details.html" class="link-details btn btn-sm btn-primary"
                                        title="More Details">Daftar</a> --}}
                                </figure>

                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html">App 1</a></h4>
                                    <p>App</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- Galery Section -->
        <section class="portfolio" id="gallery">

            <div class="container">

                <div class="section-title">
                    <h2>GALLERY</h2>
                </div>

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item wow fadeInUp">
                            <img src="images/poster/fun-run.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>Lorem ipsum, dolor sit</p>
                                <a href="images/poster/fun-run.jpeg" title="App 1" data-gallery="portfolio-gallery-app"
                                    class="link-preview portfolio-lightbox"><i class="bx bx-show"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="images/poster/run-party.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>app 1</h4>
                                <p>Lorem ipsum, dolor sit</p>
                                <a href="images/poster/run-party.jpeg" title="app 1"
                                    data-gallery="portfolio-gallery-app" class="link-preview portfolio-lightbox"><i
                                        class="bx bx-show"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="images/poster/skrun.jpeg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>app 1</h4>
                                <p>Lorem ipsum, dolor sit</p>
                                <a href="images/poster/skrun.jpeg" title="app 1" data-gallery="portfolio-gallery-app"
                                    class="link-preview portfolio-lightbox"><i class="bx bx-show"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->
                    </div><!-- End Portfolio Container -->

                </div>

                <div class="mt-3 text-center">
                    <a href="{{ route('gallery') }}" type="button" class="btn btn-outline-primary btn-fw btn-lg">Cari
                        momen terbaikmu</a>
                </div>

            </div>

        </section>

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>TESTIMONIALS</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Pengalaman berlari yang luar biasa! Semua peserta dan panitia sangat ramah dan
                                    mendukung. Menyelesaikan lomba memberikan kepuasan tersendiri. Terima kasih untuk acara
                                    yang tak terlupakan!
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>Dewi Susanti</h3>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Pertama kali saya ikut event lari dan langsung jatuh cinta! Semuanya teratur dengan
                                    baik, dari registrasi hingga garis finish. Pengalaman yang sangat memotivasi!
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>Siti Aisyah</h3>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Pengalaman yang sangat mendebarkan! Melihat para peserta berjuang dengan beban yang
                                    luar biasa sungguh menginspirasi. Organisasi acaranya sangat baik, dan semuanya berjalan
                                    lancar.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>Wahyu Utami</h3>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Acara lari ini benar-benar menginspirasi! Saya merasa sangat didukung oleh komunitas
                                    pelari yang positif. Rasanya luar biasa bisa mencapai garis finish dan mendapatkan
                                    medali.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>Bambang Santoso</h3>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Acara lari ini luar biasa! Rutenya menantang namun sangat memuaskan. Organisasinya
                                    sangat baik, dan suasananya sangat mendukung. Saya tidak sabar untuk berpartisipasi lagi
                                    tahun depan!
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <h3>Andi Prasetyo</h3>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>CONTACT</h2>
                    <p>Hubungi kami untuk pengalaman olahraga yang menakjubkan</p>
                </div>

                <div class="row mt-5 justify-content-center">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>Perum Cikarang Griya Pratama<br>Blok G12 No.6</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p><a href="https://wa.me/081386286794">+62 8138 6286 794</a></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection()
