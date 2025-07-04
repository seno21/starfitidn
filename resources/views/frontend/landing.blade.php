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
                <div id="carouselExample" class="carousel slide justify-content-center align-items-center p-0">
                    <div class="carousel-inner">
                        @foreach ($gallerys as $gallery)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $gallery->nama_foto) }}" class="d-block w-100" alt="banner">
                            </div>
                        @endforeach
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
                        <img src="{{ asset('storage/' . $about->thumbnail) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>About Us</h3>
                        <p>
                            {{ $about->konten }}
                        </p>
                        {{-- Tombol Join Partner --}}
                        {{-- <div>
                            <p class="mt-5">
                                <a href="#about" class="btn btn-outline-primary text-uppercase scrollto">Join Partner</a>
                            </p> --}}
                    </div>
                </div>
            </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                {{-- Section bagian peserta yag pernah daftar dll --}}
                {{-- <div class="row">

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

                </div> --}}

            </div>
        </section>

        <!-- ======= Event Section ======= -->
        <section id="event" class="section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>DAFTAR EVENT</h2>
                </div>
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-6 col-lg-3 mt-3">
                            <div class="card shadow-sm m-1 border-0 mt-3 d-flex flex-column h-100">
                                <div class="position-relative p-3">
                                    <a href="{{ asset('storage/' . $event->poster) }}" data-gallery="portfolioGallery"
                                        class="link-preview portfolio-lightbox">
                                        <img src="{{ asset('storage/' . $event->poster) }}"
                                            class="img-fluid rounded w-100 card-img-top shadow border-0" alt=""
                                            style="object-fit: cover; height: 200px;">
                                    </a>
                                    <label
                                        class="badge position-absolute rounded top-0 end-0 m-2 fs-6 text-uppercase {{ $event->status == 'ongoing' ? 'bg-success' : ($event->status == 'upcoming' ? 'bg-warning' : 'bg-danger') }}">
                                        {{ $event->status }}
                                    </label>
                                    <label
                                        class="badge position-absolute rounded bottom-0 start-0 end-0 m-2 border bg-white text-primary border-primary fs-6 text-uppercase">
                                        {{ $event->penyelenggara }}
                                    </label>
                                </div>
                                <div class="card-body flex-grow-1 d-flex flex-column">
                                    <h5 class="card-title fw-bold text-uppercase">{{ $event->nama_event }}</h5>
                                    <hr>
                                    <div class="card-text" style="min-height: 100px; max-height: 150px; overflow-y: auto;">
                                        <table class="table table-borderless">
                                            <tr class="font-weight-bold">
                                                <td class="fw-bold">WAKTU</td>
                                            </tr>
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($event->waktu_pelaksanaan)->translatedFormat('d F Y H:m') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">LOKASI</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $event->lokasi }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer m-0 bg-white">
                                    <small class="text-muted">
                                        <small class="text-muted">
                                            <a href="{{ route('show.event', $event->slug) }}"
                                                class="btn btn-info btn-block fw-bold border-2 w-100 text-light"><i
                                                    class='bx bxs-info-circle'></i> Detail Event
                                            </a>
                                        </small>
                                    </small>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="mt-5 text-center">
                    <a href="{{ route('event') }}" type="button" class="btn btn-outline-primary btn-fw btn-lg"> Lihat
                        Seluruh Event</a>
                </div>



            </div>
        </section>

        <!-- ======= Portfolio Section ======= -->
        <section id="gallery" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>GALLERY KAMI</h2>
                </div>

                <div class="row">
                    @foreach ($gallerys as $gallery)
                        <div class="col-md-3">
                            <div class="p-2 border border-2 rounded shadow mt-3">
                                <figure id="portfolioGallery">
                                    <a href="{{ asset('storage/' . $gallery->nama_foto) }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox">
                                        <img src="{{ asset('storage/' . $gallery->nama_foto) }}"
                                            class="gallery-img rounded p-2 img-fluid" alt="Gallery Kami"></a>
                                </figure>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="mt-5 text-center">
                    <a href="{{ route('gallery') }}" type="button" class="btn btn-outline-primary btn-fw btn-lg">Cari
                        Momen Terbaikmu</a>
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
                            <div class="testimonial-item rounded">
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
                            <div class="testimonial-item rounded">
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
                            <div class="testimonial-item rounded">
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
                            <div class="testimonial-item rounded">
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
                            <div class="testimonial-item rounded">
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
        {{-- <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>CONTACT</h2>
                    <p>Hubungi kami untuk pengalaman olahraga yang menakjubkan</p>
                </div>

                <div class="row mt-5 justify-content-center">

                    <div class="col-lg-12">

                        <div class="info-wrap rounded">
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
                                    <i class='bx bxl-whatsapp'></i>
                                    <h4>WhatsApp:</h4>
                                    <p><a href="https://wa.me/081386286794">+62 8138 6286 794</a></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </section> --}}
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection()
