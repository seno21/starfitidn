@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">

                    {{-- {{ dd($about->id) }} --}}
                    <a class="btn btn-md btn-primary" href="{{ route('landing.edit', $abouts->id) }}" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="ti-settings"></i>
                        <span class="menu-title">LANDING PAGE</span>
                    </a>

                </div>
            </div>
        </div>
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
                            <select class="form-control mr-2 text-dark" id="event" name="event">
                                <option value="">Pilih Event</option>
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
        @if (isset($eventId))
            <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <a href="{{ route('event.eom.peserta', $eventId) }}?today=true"
                        class="card card-tale text-decoration-none text-white">
                        {{-- <div class="card card-tale"> --}}
                        <div class="card-body">
                            <p class="mb-4 fs-5 fw-bold">Hari Ini</p>
                            <p class="fs-30 mb-2">{{ $pesertaHariIni }} Peserta</p>
                            <p class="fs-5 fw-bolder">Terdaftar Pada Event</p>
                        </div>
                        {{-- </div> --}}
                    </a>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <a href="{{ route('event.eom.peserta', $eventId) }}"
                        class="card card-dark-blue text-decoration-none text-white">
                        {{-- <div class="card card-dark-blue"> --}}
                        <div class="card-body">
                            <p class="mb-4 fs-5 fw-bold">Total Pendaftar</p>
                            <p class="fs-30 mb-2">{{ $totalPendaftar }} Peserta</p>
                            <p>Sudah mendapat BIB</p>
                        </div>
                        {{-- </div> --}}
                    </a>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <a href="{{ route('event.eom.index') }}"
                        class="text-decoration-none text-white card bg-danger text-light">
                        <div class="card-body">
                            <p class="mb-4 fs-5 fw-bold">Total Event</p>
                            <p class="fs-30 mb-2">{{ $event }} Event</p>
                            <p>Sudah terbuat</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <a href="{{ route('list-akun') }}" class="text-decoration-none text-white bg-success text-light">
                        <div class="card text-light bg-success">
                            <div class="card-body">
                                <p class="mb-4 fs-5 fw-bold">Total User</p>
                                <p class="fs-30 mb-2">{{ DB::table('users')->count() }} User</p>
                                <p>Terdaftar Pada Web <a href="http://starfitidn.com">starfitidn.com</a></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4 fs-5 fw-bold">Silakan pilih event terlebih dahulu</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- content-wrapper ends -->


    <!-- main-panel ends -->
@endsection()
