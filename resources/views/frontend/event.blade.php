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
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm m-1 border border-primary mt-3">
                        {{-- <div class="portfolio-item filter-app wow fadeInUp"> --}}
                        <div class="position-relative p-3">
                            <a href="{{ asset('storage/' . $event->poster) }}" data-gallery="portfolioGallery"
                                class="link-preview portfolio-lightbox">
                                <img src="{{ asset('storage/' . $event->poster) }}"
                                    class="img-fluid rounded w-100 card-img-top shadow border-0" alt=""
                                    style="object-fit: cover; height: 200px;">
                            </a>
                            <label
                                class="badge position-absolute rounded top-0 end-0 m-2 fs-6 text-uppercase {{ $event->status == 'ongoing' ? 'bg-primary' : ($event->status == 'upcoming' ? 'bg-warning' : 'bg-danger') }}">
                                {{ $event->status }}
                            </label>
                            <label
                                class="badge position-absolute rounded bottom-0 start-0 end-0 m-2 border bg-white text-primary border-primary fs-6 text-uppercase">
                                {{ $event->penyelenggara }}
                            </label>
                        </div>
                        {{-- <div class="portfolio-wrap card-img-top">
                            <figure class="figure p-2 img-thumbnail">
                            </figure>
                        </div> --}}
                        {{-- </div> --}}
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-uppercase">{{ $event->nama_event }}</h5>
                            <hr>
                            <div class="card-text" style="min-height: 100px; max-height: 150px; overflow-y: auto;">
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
                            {{-- <p class="card-text">
                                <small class="text-muted">{{ $event->status }}</small>
                            </p> --}}
                        </div>
                        <div class="card-footer m-0 bg-white">
                            <small class="text-muted">
                                <a href="" class="btn btn-primary btn-block fw-bold border-2 w-100"><i
                                        class='bx bxs-mouse'></i> Daftar Event</a>
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->
@endsection()
