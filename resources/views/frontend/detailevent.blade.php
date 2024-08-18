@extends('frontend.partials.main')
@section('content')
    <!-- ======= Event Section ======= -->
    <section id="event" class="min-vh-100 section-bg">
        <div class="modal fade" id="modalTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pembelian
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="tiketForm" method="POST" action="{{ route('event.eom.insertTiket') }}">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="id_event" value="{{ $event->id }}">
                                <input type="hidden" name="id" id="tiket_id">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group mb-2">
                                                <label for="tiket">Nama Lengkap</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                        name="nama_lengkap" id="nama_lengkap"
                                                        value="{{ old('nama_lengkap') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">NIK</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        name="nik" id="nik" value="{{ old('nik') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Jenis Kelamin</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('jk') is-invalid @enderror"
                                                        name="jk" id="jk" value="{{ old('jk') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Tempat Lahir</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        name="tempat_lahir" id="tempat_lahir"
                                                        value="{{ old('tempat_lahir') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Tanggal Lahir</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        name="tanggal_lahir" id="tanggal_lahir"
                                                        value="{{ old('tanggal_lahir') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Usia</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('usia') is-invalid @enderror"
                                                        name="usia" id="usia" value="{{ old('usia') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group mb-2">
                                                <label for="tiket">No Handphone</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('no_hp') is-invalid @enderror"
                                                        name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Email</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Kontak Darurat</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('kontak_darurat') is-invalid @enderror"
                                                        name="kontak_darurat" id="kontak_darurat"
                                                        value="{{ old('kontak_darurat') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Domisili</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('domisili') is-invalid @enderror"
                                                        name="domisili" id="domisili" value="{{ old('domisili') }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="tiket">Ukuran Jersey</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('ukuran_jersey') is-invalid @enderror"
                                                        name="ukuran_jersey" id="ukuran_jersey"
                                                        value="{{ old('ukuran_jersey') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Detail Pembayaran</span>
                                        <span class="badge badge-secondary badge-pill">3</span>
                                    </h4>
                                    <ul class="list-group mb-3" id="detailTiket">

                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        id="btn-batal">Batal</button>
                                    <button type="submit" class="btn btn-primary" id="btn-submit">Proses
                                        Pembayaran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 order-1 order-md-0 mt-2 mt-md-0 text-center">
                    <p class="fw-bold fs-4">
                        Tiket
                    </p>

                    @if (count($tikets) == 0)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mohon Maaf 👏</h4>
                                <p>Tiket tidak tersedia</p>
                            </div>
                        </div>
                    @else
                        <div style="min-height: 100px; max-height: 80vh; overflow-y: auto; overflow-x: hidden"
                            class="px-4">
                            @foreach ($tikets as $tiket)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title">{{ $tiket->nama_promo }}</h4>
                                            <div id="countdown-{{ $tiket->id }}" class="text-danger fw-bold"></div>
                                            @if ($tiket->tgl_selesai)
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">Rp. {{ number_format($tiket->harga, 0, ',', '.') }}</p>
                                            @if ($tiket->quota)
                                                <p class="text-muted">Kuota: {{ $tiket->quota ?? '-' }}</p>
                                            @else
                                                <p class="text-muted">Terjual: 90</p>
                                            @endif
                                        </div>
                                        @if ($tiket->tgl_selesai && strtotime($tiket->tgl_selesai) > time())
                                            <div class="progress progress-md">
                                                <div class="progress-bar bg-info" style="width: {{ 25 }}%"
                                                    role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="{{ $tiket->quota }}">
                                                    {{ 25 }} Terjual</div>
                                            </div>
                                            @auth
                                                <div class="mt-2">
                                                    {{-- <button class="btn btn-block w-100 btn-outline-primary">Beli Tiket</button> --}}
                                                    <button type="button"
                                                        class="btn btn-block w-100 btn-outline-primary edit-tiket"
                                                        data-target="#modalTiket" data-toggle="modal"
                                                        data-id="{{ $tiket->id }}"
                                                        data-nama_promo="{{ $tiket->nama_promo }}"
                                                        data-harga="{{ $tiket->harga }}">
                                                        Beli Tiket
                                                    </button>
                                                </div>
                                            @endauth
                                        @else
                                            <p class="text-danger">Penjualan sudah ditutup</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-6 order-0" style="padding-left: 30px;">
                    <div class="card p-4">
                        <div class="top-section"
                            style="background-image: url('{{ asset('storage/' . $event->poster) }}')">
                            <div class="border border-0">{{ $event->penyelenggara }}</div>
                            <div class="icons">
                                <div class="logo">
                                </div>
                                <div class="social-media">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="svg">
                                        <path
                                            d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z">
                                        </path>
                                    </svg>
                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                        </path>
                                    </svg>
                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path
                                            d="M524.531,69.836a1.5,1.5,0,0,0-.764-.7A485.065,485.065,0,0,0,404.081,32.03a1.816,1.816,0,0,0-1.923.91,337.461,337.461,0,0,0-14.9,30.6,447.848,447.848,0,0,0-134.426,0,309.541,309.541,0,0,0-15.135-30.6,1.89,1.89,0,0,0-1.924-.91A483.689,483.689,0,0,0,116.085,69.137a1.712,1.712,0,0,0-.788.676C39.068,183.651,18.186,294.69,28.43,404.354a2.016,2.016,0,0,0,.765,1.375A487.666,487.666,0,0,0,176.02,479.918a1.9,1.9,0,0,0,2.063-.676A348.2,348.2,0,0,0,208.12,430.4a1.86,1.86,0,0,0-1.019-2.588,321.173,321.173,0,0,1-45.868-21.853,1.885,1.885,0,0,1-.185-3.126c3.082-2.309,6.166-4.711,9.109-7.137a1.819,1.819,0,0,1,1.9-.256c96.229,43.917,200.41,43.917,295.5,0a1.812,1.812,0,0,1,1.924.233c2.944,2.426,6.027,4.851,9.132,7.16a1.884,1.884,0,0,1-.162,3.126,301.407,301.407,0,0,1-45.89,21.83,1.875,1.875,0,0,0-1,2.611,391.055,391.055,0,0,0,30.014,48.815,1.864,1.864,0,0,0,2.063.7A486.048,486.048,0,0,0,610.7,405.729a1.882,1.882,0,0,0,.765-1.352C623.729,277.594,590.933,167.465,524.531,69.836ZM222.491,337.58c-28.972,0-52.844-26.587-52.844-59.239S193.056,219.1,222.491,219.1c29.665,0,53.306,26.82,52.843,59.239C275.334,310.993,251.924,337.58,222.491,337.58Zm195.38,0c-28.971,0-52.843-26.587-52.843-59.239S388.437,219.1,417.871,219.1c29.667,0,53.307,26.82,52.844,59.239C470.715,310.993,447.538,337.58,417.871,337.58Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-section">
                            <span class="title">{{ $event->nama_event }}</span>
                            <div class="row row1">
                                <div class="item">
                                    <span class="regular-text">Lokasi</span>
                                    <span class="big-text"> {{ $event->lokasi }}</span>
                                </div>
                                <div class="item">
                                    <span class="regular-text">Waktu</span>
                                    <span
                                        class="big-text text-center">{{ \Carbon\Carbon::parse($event->waktu_pelaksanaan)->translatedFormat('d F Y H:m') }}</span>
                                </div>
                            </div>
                            <div class="row row1">
                                <div class="item">
                                    <span class="regular-text">Deskripsi</span>
                                    <span class="big-text"> {!! $event->deskripsi !!}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-3 order-2">
                    <div class="card border rounded rounded-3 border-2 border-info p-2">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">YUK JOIN EVENT</h3>
                                <hr class="border border-1 border-info">
                                @auth
                                    <a href="" class="btn btn-outline-primary d-block mt-2"><i
                                            class='bx bxs-mouse'></i>Klik
                                        Untuk
                                        Daftar
                                    </a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary d-block mt-2">Login untuk
                                        daftar
                                    </a>
                                @endguest
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
                        <div class="row mt-3">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tikets = @json($tikets);
            // Untuk countdown
            tikets.forEach(tiket => {
                if (tiket.tgl_selesai) {
                    const countdownDate = new Date(tiket.tgl_selesai).getTime();
                    const countdownElement = document.getElementById(`countdown-${tiket.id}`);

                    const countdownFunction = setInterval(() => {
                        const now = new Date().getTime();
                        const distance = countdownDate - now;

                        if (distance < 0) {
                            clearInterval(countdownFunction);
                            countdownElement.innerHTML = "Penjualan sudah ditutup";
                        } else {
                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 *
                                60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            countdownElement.innerHTML =
                                `${days}d ${hours}h ${minutes}m ${seconds}s`;
                        }
                    }, 1000);
                }
            });


            const btnBeliTiket = document.querySelectorAll('.edit-tiket')
            const modalBeliTiket = new bootstrap.Modal(document.getElementById('modalTiket'));

            btnBeliTiket.forEach(btnBeli => {
                btnBeli.addEventListener('click', () => {
                    modalBeliTiket.show()
                    const userLogin = @json(Auth::user());
                    // document.querySelector('#tiket').value = btnBeli.dataset.nama_promo
                    // document.querySelector('#harga').value = btnBeli.dataset.harga
                    document.querySelector('#detailTiket').innerHTML = `
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">${btnBeli.dataset.nama_promo}</h6>
                            </div>
                            <span class="text-muted">Rp. ${btnBeli.dataset.harga}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (IDR)</span>
                            <strong>Rp. ${btnBeli.dataset.harga}</strong>
                        </li>
                    `
                })
            })

        });
    </script>

    <style>
        .card {
            padding: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 20px 0px;
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card .top-section {
            width: 100%;
            height: 250px;
            border-radius: 15px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card .top-section .border {
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 20px;
            border-top-left-radius: 10px;
            border: none;
            height: 30px;
            padding: 2px 20px;
            width: 50%;
            color: white;
            background: #1b233d;
            position: relative;
            transform: skew(-20deg);
        }

        .card .top-section .icons {
            top: 0;
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: space-between;
        }

        .card .top-section .icons .logo {
            color: white;
            font-weight: 700;
        }

        .card .top-section .icons .logo .top-section {
            height: 100%;
        }

        .card .top-section .icons .social-media {
            height: 100%;
            padding: 8px 15px;
            display: flex;
            gap: 7px;
        }

        .card .top-section .icons .social-media .svg {
            height: 100%;
            fill: #1b233d;
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card .top-section .icons .social-media .svg:hover {
            transform: scale(2);
        }

        .card .bottom-section {
            margin-top: 15px;
            padding: 10px 5px;
        }

        .card .bottom-section .title {
            display: block;
            font-size: 3rem;
            font-weight: bolder;
            text-align: center;
            letter-spacing: 2px;
        }

        .card .bottom-section .row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card .bottom-section .row .item {
            flex: 30%;
            text-align: center;
            padding: 5px;
        }

        .card .bottom-section .row .item .big-text {
            padding: 0 10px;
            text-align: left;
            font-size: 1rem;
            display: block;
        }

        .card .bottom-section .row .item .regular-text {
            font-size: 0.8rem;
        }

        .card .bottom-section .row .item:nth-child(2) {
            border-left: 1px solid rgba(0, 0, 0, 0.126);
            border-right: 1px solid rgba(0, 0, 0, 0.126);
        }
    </style>

@endsection()
