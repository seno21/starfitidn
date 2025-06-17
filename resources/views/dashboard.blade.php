@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang, <u> {{ Auth::user()->name }}</u></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="GET" action="{{ route('dashboard') }}">
                    <div class="form-group">
                        <label for="event">Pilih Event</label>
                        <div class="d-flex align-items-center">
                            <select class="form-control mr-2" id="event" name="event">
                                @foreach ($allEvents as $allEvent)
                                    <option class="text-truncate" value="{{ $allEvent->id }}"
                                        {{ request('event') == $allEvent->id ? 'selected' : '' }}>
                                        {{ $allEvent->nama_event }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary ml-2" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4 fs-5 fw-bold">Hari Ini</p>
                        <p class="fs-30 mb-2">{{ $pesertaHariIni }} Peserta</p>
                        <p class="fs-5 fw-bolder">Terdaftar Pada Event</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4 fs-5 fw-bold">Total Pendaftar</p>
                        <p class="fs-30 mb-2">{{ $totalPendaftar }} Peserta</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card text-light bg-danger">
                    <div class="card-body">
                        <p class="mb-4 fs-5 fw-bold">Total Event</p>
                        <p class="fs-30 mb-2">{{ $event }} Event</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card text-light bg-success">
                    <div class="card-body">
                        <p class="mb-4 fs-5 fw-bold">Total User</p>
                        <p class="fs-30 mb-2">{{ DB::table('users')->count() }} User</p>
                        <p>Terdaftar Pada Web <a href="http://starfitidn.com">starfitidn.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    <!-- main-panel ends -->
@endsection()
