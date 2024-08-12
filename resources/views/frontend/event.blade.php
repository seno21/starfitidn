@extends('frontend.partials.main')
@section('content')
    <!-- ======= Portfolio Section ======= -->
    <section id="event">
        <div class="container">

            <div class="section-title mt-3">
                <h2>DAFTAR EVENT</h2>
            </div>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-3">
                        <div class="card border-primary border-3 m-1">
                            {{-- <div class="portfolio-item filter-app wow fadeInUp"> --}}
                            <div class="portfolio-wrap">
                                <figure class="figure p-2 img-thumbnail">
                                    <a href="{{ asset('storage/' . $event->poster) }}" data-gallery="portfolioGallery"
                                        class="link-preview portfolio-lightbox">
                                        <img src="{{ asset('storage/' . $event->poster) }}"
                                            class="img-fluid rounded fixed-image" alt=""></a>
                                </figure>
                            </div>
                            {{-- </div> --}}
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-uppercase">{{ $event->nama_event }}</h5>
                                <hr>
                                <div class="card-text " style="min-height: 150px; overflow-y: auto;">
                                    <table class="table table-borderless">
                                        <tr class="font-weight-bold">
                                            <td class="fw-bold">WAKTU</td>
                                            <td>: </td>
                                            <td>{{ $event->waktu_pelaksanaan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">LOKASI</td>
                                            <td>: </td>
                                            <td>{{ $event->lokasi }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="card-text">
                                    <small class="text-muted">{{ $event->status }}</small>
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    <a href="" class="btn btn-outline-primary btn-block fw-bold border-2"><i
                                            class='bx bxs-mouse mr-1'></i> Daftar Event</a>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->
@endsection()
