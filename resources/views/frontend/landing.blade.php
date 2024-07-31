@extends('frontend.partials.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <h1>Welcome to <span class="text-danger">StarfitIDN</span></h1>
            <h2>Kami menciptakan pengalaman olahraga yang tak terlupakan .</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container mt-5 pt-2">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/img/about.svg" class="img-fluid" alt="">
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


        {{-- <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Happy Clients</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hard Workers</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section --> --}}

        <!-- ======= Portfolio Section ======= -->
        <section id="event" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2>DAFTAR EVENT</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">Ongoin</li>
                            <li data-filter=".filter-card">Upcoming</li>
                            <li data-filter=".filter-web">Completed</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                    class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 1</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-2.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 3</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-3.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 2</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-4.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 2</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-5.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 2</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-6.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">App 3</a></h4>
                                <p>App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-7.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 1</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-8.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Card 3</a></h4>
                                <p>Card</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/portfolio-9.jpg" class="link-preview portfolio-lightbox"
                                    data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Web 1</a></h4>
                                <p>Web</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Testimonials</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                    veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                    fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title">
                    <h2>Team</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/team/team-1.jpg" alt="">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <p>
                                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis
                                quaerat qui aut aut aut
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="assets/img/team/team-2.jpg" alt="">
                            <h4>Sarah Jhinson</h4>
                            <span>Product Manager</span>
                            <p>
                                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum
                                rerum temporibus
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Hubungi kami untuk pengalaman olahraga yang menakjubkan</p>
                </div>

                <div class="row mt-5 justify-content-center">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>A108 Adam Street<br>New York, NY 535022</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection()
