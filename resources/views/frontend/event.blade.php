@extends('frontend.partials.main')
@section('content')
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
                            <img src="images/poster/fun-run.jpeg" class="img-fluid" alt="">
                            <a href="images/poster/fun-run.jpeg" data-gallery="portfolioGallery"
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
                            <img src="images/poster/skrun.jpeg" class="img-fluid" alt="">
                            <a href="images/poster/skrun.jpeg" class="link-preview portfolio-lightbox"
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
@endsection()
