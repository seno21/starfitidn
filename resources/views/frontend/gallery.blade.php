@extends('frontend.partials.main')
@section('content')
    <!-- Portfolio Section -->
    <section class="portfolio min-vh-100">

        <div class="container pt-3 mt-4">

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
                            <a href="images/poster/run-party.jpeg" title="app 1" data-gallery="portfolio-gallery-app"
                                class="link-preview portfolio-lightbox"><i class="bx bx-show"></i></a>
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

        </div>

    </section><!-- /Portfolio Section -->
@endsection()
