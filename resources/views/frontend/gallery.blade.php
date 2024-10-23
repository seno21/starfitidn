@extends('frontend.partials.main')
@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="gallery" class="portfolio min-vh-100">
        <div class="container">
            <div class="section-title mt-4">
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
                            <div>
                                <a href="{{ route('gallery.img.download', $gallery->nama_foto) }}"
                                    class="btn btn-sm btn-success text-light align-items-center">
                                    <i class="bx bx-download pl-1 mr-2"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection()
