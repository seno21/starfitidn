@extends('frontend.partials.main')
@section('content')
    <!-- ======= Event Section ======= -->
    <section id="event" class="section-bg">
        <div class="container mt-3">

            <div class="section-title">
                <h2>DAFTAR EVENT</h2>
            </div>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-6 col-lg-3 m-2">
                        <div class="card shadow-sm m-1 border-0 mt-3 d-flex flex-column h-100">
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
                            <div class="card-body flex-grow-1 d-flex flex-column">
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
                            </div>
                            <div class="card-footer m-0 bg-white">
                                <small class="text-muted">
                                    <a href="{{ route('show.event', $event->id) }}"
                                        class="btn btn-info btn-block fw-bold border-2 w-100 text-light"><i
                                            class='bx bxs-info-circle'></i> Detail Event</a>
                                    <a href="" class="btn btn-primary btn-block fw-bold border-2 w-100 mt-2"><i
                                            class='bx bxs-mouse'></i> Join Event Ini</a>
                                </small>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection()
