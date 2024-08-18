@extends('frontend.partials.main')
@section('content')
    <!-- ======= Event Section ======= -->
    <section id="event" class="min-vh-100 section-bg">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $event->poster) }}"
                        class="img-fluid rounded-4 w-100 card-img-top shadow-lg border-0 p-2 mb-3 "
                        style="object-fit: cover; height: auto;">
                </div>
                <div class="col-md-6" style="padding-left: 30px;">
                    <h1 class="fw-bold">{{ strtoupper($event->nama_event) }}</h1>
                    <hr class="border-3 shadow rounded border border-primary">
                    <div class="card card-title p-4 rounded shadow">
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <p class="fw-bold fs-5">
                                    WAKTU
                                </p>
                                <p class="fs-6">
                                    {{ $event->waktu_pelaksanaan }}
                                </p>
                            </div>
                            <div class="col-md-7">
                                <p class="fw-bold fs-5">
                                    LOKASI
                                </p>
                                <p class="fs-6">
                                    {{ $event->lokasi }}
                                </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p class="fw-bold fs-4">
                                    PENYELENGGARA
                                </p>
                                <p class="fs-4">
                                    {{ $event->penyelenggara }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mt-3">
                            <p class="fw-bold fs-4">
                                Tentang Event.
                            </p>
                            <p class="fs-5 mt-3">
                                {!! $event->deskripsi !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-3">
                    <div class="card border rounded rounded-3 border-2 border-info p-2">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">BAGIKAN EVENT</h3>
                                <hr class="border border-1 border-info">
                                <div class="social-links">
                                    <a href="#"><i class="bx bxl-facebook "></i></a>
                                    <a href="https://www.instagram.com/starfitindonesiaa" target="_blank"><i
                                            class="bx bxl-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">YUK JOIN EVENT</h3>
                                <hr class="border border-1 border-info">
                                <a href="" class="btn btn-outline-primary d-block mt-2"><i
                                        class='bx bxs-mouse'></i>Klik
                                    Untuk
                                    Daftar
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">HUBUNGI KAMI</h3>
                                <hr class="border border-1 border-info">
                                <div class="mt-3">
                                    <a href="" class="btn btn-outline-primary d-block mt-2"><i
                                            class='bx bxs-user'></i>Contact
                                        Person
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()
