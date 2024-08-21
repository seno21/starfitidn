@extends('frontend.partials.main')
@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="gallery" class="portfolio min-vh-100">
        <div class="container mt-4">

            <div class="section-title">
                <h2>GALLERY KAMI</h2>
            </div>

            <div class="row">
                {{-- @foreach ($gallerys as $gallery) --}}
                <div class="col-md-3">
                    <div class="p-2 border border-2 rounded shadow mt-3">
                        <figure>
                            {{-- <a href="{{ asset('storage/' . $gallery->nama_foto) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <img src="{{ asset('storage/' . $gallery->nama_foto) }}"
                                    class="gallery-img rounded p-2 img-fluid" alt="Gallery Kami"></a> --}}
                        </figure>
                    </div>
                </div>
                {{-- @endforeach --}}

            </div>


        </div>
    </section><!-- End Portfolio Section -->
@endsection()
