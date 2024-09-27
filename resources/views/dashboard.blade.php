@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang, {{ Auth::user()->name }}</h3>
                        {{-- <h3 class="font-weight-bold">Welcome Aamir</h3> --}}
                        <h6 class="font-weight-normal mb-0">Sistem berjalan baik, kamu memiliki
                            <span class="text-primary">3 pesan notifikasi!</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="images/dashboard/people.svg" alt="people">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div class="ml-2">
                                    <a class="btn btn-primary" href="{{ route('home') }}">Back to Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Peserta Daftar Hari Ini</p>
                                <p class="fs-30 mb-2">{{ $transaksi->pesertaToday() }} Peserta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Pendaftar</p>
                                <p class="fs-30 mb-2">{{ $transaksi->totalPendaftar() }} Terdaftar</p>
                                <p>Pada Semua Event</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Event</p>
                                <p class="fs-30 mb-2">{{ $event }} Event</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Total User</p>
                                <p class="fs-30 mb-2">{{ DB::table('users')->count() }} User</p>
                                <p>Terdaftar Pada Web <a href="http://starfitidn.com">starfitidn.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    <!-- main-panel ends -->
@endsection()
