@extends('frontend.partials.main')
@section('content')
    <!-- ======= Event Section ======= -->
    <section id="event" class="">
        <div class="container mt-5">

            {{-- <div class="section-title">
                <h2>DAFTAR EVENT</h2>
            </div> --}}
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . ($event->poster ?? '')) }}"
                        class="img-fluid rounded-4 w-100 card-img-top shadow-lg border-0 p-2 mb-3 "
                        style="object-fit: cover; height: auto;">
                </div>
                <div class="col-md-6 p-3" style="margin-left: 35px">
                    <h1>{{ $event->nama_event ?? '' }}</h1>
                    <hr class="border-3 shadow rounded border border-primary">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p class="fw-bold fs-4">
                                WAKTU
                            </p>
                            <p class="fs-4">
                                {{ $event->waktu_pelaksanaan ?? '' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold fs-4">
                                LOKASI
                            </p>
                            <p class="fs-4">
                                {{ $event->lokasi ?? '' }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="mt-3">
                            <p class="fw-bold fs-4">
                                Tentang Event.
                            </p>
                            <p class="fs-5 mt-3">
                                <pre>
                                    {{-- {{ $event->deskripsi }} --}}
                                </pre>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@endsection()
