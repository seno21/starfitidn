@extends('frontend.partials.main')
@section('content')
    <!-- ======= Event Section ======= -->
    <section id="event" class="min-vh-100 section-bg">
        {{-- @if (count($detailUsers) > 0) --}}
        @if (isset($detailUsers))
            <div class="modal fade" id="modalTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pembelian
                            </h1>
                            <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form id="tiketForm" method="POST" action="{{ route('transaksi') }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="id_event" value="{{ $event->id }}">
                                    <input type="hidden" name="id_user" value="{{ $detailUsers->id_user ?? '' }}">
                                    <input type="hidden" name="id_tiket" id="tiket_id">
                                    <input type="hidden" name="harga" id="harga">
                                    <input type="hidden" name="qty" id="qty">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group my-3">
                                                    <label for="tiket">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                            name="nama_lengkap" id="nama_lengkap"
                                                            value="{{ $detailUsers->nama_lengkap ?? old('nama_lengkap') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="tiket">NIK</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('nik') is-invalid @enderror"
                                                            name="nik" id="nik"
                                                            value="{{ $detailUsers->nik ?? old('nik') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                                    <div class="d-flex">
                                                        <div class="col-sm-4">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="jenis_kelamin" id="L"
                                                                        value="laki-laki"
                                                                        {{ $detailUsers->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                                                                    Laki-laki
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="jenis_kelamin" id="NL"
                                                                        value="perempuan"
                                                                        {{ $detailUsers->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                                                                    Perempuan
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group my-3">
                                                <label for="tiket">Jenis Kelamin</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('jk') is-invalid @enderror"
                                                        name="jk" id="jk" value="{{ old('jk'), $detailUsers->jenis_kelamin ?? '' }}">
                                                </div>
                                            </div> --}}
                                                <div class="form-group my-3">
                                                    <label for="tiket">Tempat Lahir</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                            name="tempat_lahir" id="tempat_lahir"
                                                            value="{{ $detailUsers->tempat_lahir ?? old('tempat_lahir') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="tiket">Tanggal Lahir</label>
                                                    <div class="input-group">
                                                        <input type="date"
                                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                            name="tgl_lahir" id="tgl_lahir"
                                                            value="{{ $detailUsers->tgl_lahir ?? old('tgl_lahir') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group my-3">
                                                    <label for="tiket">No Handphone</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('no_telp') is-invalid @enderror"
                                                            name="no_telp" id="no_telp"
                                                            value="{{ $detailUsers->no_telp ?? old('no_telp') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="tiket">Email</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" id="email"
                                                            value="{{ $detailUsers->email ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="tiket">Kontak Darurat</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('kontak_darurat') is-invalid @enderror"
                                                            name="kontak_darurat" id="kontak_darurat"
                                                            value="{{ $detailUsers->kontak_darurat ?? old('kontak_darurat') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="tiket">Domisili</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('domisili') is-invalid @enderror"
                                                            name="domisili" id="domisili"
                                                            value="{{ $detailUsers->domisili ?? old('domisili') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group my-3">
                                                    <label for="ukuran_jersey">Ukuran Jersey</label>
                                                    <select class="form-control form-select" id="status"
                                                        name="ukuran_jersey">
                                                        <option value="s"
                                                            {{ $detailUsers->ukuran_jersey == 's' ? 'selected' : '' }}>S
                                                        </option>
                                                        <option value="m"
                                                            {{ $detailUsers->ukuran_jersey == 'm' ? 'selected' : '' }}>M
                                                        </option>
                                                        <option value="l"
                                                            {{ $detailUsers->ukuran_jersey == 'l' ? 'selected' : '' }}>L
                                                        </option>
                                                        <option value="xl"
                                                            {{ $detailUsers->ukuran_jersey == 'xl' ? 'selected' : '' }}>XL
                                                        </option>
                                                        <option value="xxl"
                                                            {{ $detailUsers->ukuran_jersey == 'xxl' ? 'selected' : '' }}>
                                                            XXL
                                                        </option>
                                                        <option value="xxxl"
                                                            {{ $detailUsers->ukuran_jersey == 'xxxl' ? 'selected' : '' }}>
                                                            XXXL
                                                        </option>
                                                        <option value="4xl"
                                                            {{ $detailUsers->ukuran_jersey == '4xl' ? 'selected' : '' }}>
                                                            4XL
                                                        </option>
                                                    </select>
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
                                        <button type="button" class="btn btn-danger close" data-bs-dismiss="modal"
                                            id="btn-batal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            id="btn-submit">Konfirmasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 order-1 order-md-0 mt-2 mt-md-0 text-center">
                    <p class="fw-bold fs-3 m-3 shadow rounded border-secondary" style="background: white;">
                        TIKET EVENT
                    </p>

                    @if (count($tikets) == 0)
                        <div class="card m-3">
                            <div class="card-body">
                                <h4 class="card-title">Mohon Maaf 👏</h4>
                                <p>Tiket tidak tersedia</p>
                            </div>
                        </div>
                    @else
                        <div style="min-height: 100px; max-height: 80vh; overflow-y: auto; overflow-x: hidden"
                            class="px-4 pt-2">
                            @foreach ($tikets as $tiket)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title text-uppercase">{{ $tiket->nama_promo }}</h4>
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
                                            @guest
                                                <a class="btn btn-block btn-outline-primary mt-2 w-100"
                                                    href="{{ route('login') }}">Login untuk Beli Tiket</a>
                                            @endguest
                                            @auth
                                                @if (!isset($transaksi))
                                                    <div class="mt-2">
                                                        <button type="button"
                                                            class="btn btn-block w-100 btn-outline-primary edit-tiket"
                                                            data-target="#modalTiket" data-toggle="modal"
                                                            data-id="{{ $tiket->id }}"
                                                            data-nama_promo="{{ $tiket->nama_promo }}"
                                                            data-harga="{{ $tiket->harga }}">
                                                            Beli Tiket
                                                        </button>
                                                    </div>
                                                @endif
                                                @if (isset($transaksi) && $transaksi->id_tiket == $tiket->id)
                                                    <a href="{{route('checkout')}}">
                                                        <button type="button"
                                                            class="btn btn-block w-100 mt-3 btn-outline-primary"
                                                            data-id="{{ $tiket->id }}"
                                                            data-nama_promo="{{ $tiket->nama_promo }}"
                                                            data-harga="{{ $tiket->harga }}">
                                                            Proses Bayar
                                                        </button>
                                                    </a>
                                                    <button class="btn btn-outline-danger change-role-btn mt-2 w-100"
                                                        data-id="{{ $tiket->id }}">
                                                        Batalkan Pesanan
                                                    </button>
                                                @endif
                                            @endauth
                                        @else
                                            <p class="text-danger">Penjualan sudah ditutup</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div style="min-height: 100px; max-height: 80vh; overflow-y: auto; overflow-x: hidden;"
                        class="border-2 rounded mt-4 shadow border p-4 px-4 card m-3">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">YUK JOIN EVENT</h3>
                                <hr class="border border-1 border-secondary">
                                @auth
                                    <a href="" class="btn btn-outline-primary mt-2"><i
                                            class='bx bxs-mouse'></i>Mendaftar Event
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
                                <hr class="border border-1 border-secondary">
                                <div class="mt-3">
                                    <a href="" class="btn btn-outline-primary text-center mt-2"><i
                                            class='bx bxs-user'></i>Contact
                                        Person
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <h3 class="fs-5 fw-bold">BAGIKAN EVENT</h3>
                                <hr class="border border-1 border-secondary">
                                <div class="social-links m-2">
                                    <a href="https://www.facebook.com/share_channel/?link={{ url()->current() }}"
                                        class="btn btn-md btn-outline-primary m-2" target="_blank"><i
                                            class="bx bxl-facebook "></i></a>
                                    <a href="#" class="btn btn-md btn-outline-primary m-2" target="_blank"><i
                                            class="bx bxl-instagram "></i></a>
                                    <a href="#" class="btn btn-md btn-outline-primary m-2" target="_blank"><i
                                            class="bx bxl-whatsapp "></i></a>
                                    <a href="https://t.me/share/url?url={{ url()->current() }}"
                                        class="btn btn-md btn-outline-primary m-2" target="_blank"><i
                                            class="bx bxl-telegram "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    {{ dd($errors) }}
                @endif
                <div class="col-md-8 order-0" style="padding-left: 25px;">
                    <div class="card p-4 shadow">
                        <div class="top-section"
                            style="background-image: url('{{ asset('storage/' . $event->poster) }}')">
                            <div class="border border-0">{{ $event->penyelenggara }}</div>
                        </div>
                        <div class="bottom-section">
                            <span class="title text-uppercase">{{ $event->nama_event }}</span>
                            <div class="row row1">
                                <div class="item">
                                    <span class="regular-text fw-bold fs-4">Lokasi</span>
                                    <span class="big-text text-center"> {{ $event->lokasi }}</span>
                                </div>
                                <div class="item">
                                    <span class="regular-text fw-bold fs-4">Waktu</span>
                                    <span
                                        class="big-text text-center">{{ \Carbon\Carbon::parse($event->waktu_pelaksanaan)->translatedFormat('d F Y H:m') }}</span>
                                </div>
                            </div>
                            <div class="row row1">
                                <div class="item">
                                    <span class="regular-text fw-bold fs-4">Deskripsi</span>
                                    <span class="big-text"> {!! $event->deskripsi !!}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- Lolasi share event sebelum update --}}
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
                            countdownElement.innerHTML = "Closed";
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

                    // const btnClose = document.querySelectorAll(".close")
                    // btnClose.forEach(close => {
                    //     close.addEventListener('click', () => {
                    //         modalBeliTiket.hide()
                    //     })
                    // })
                    document.querySelector('#tiket_id').value = btnBeli.dataset.id
                    document.querySelector('#qty').value = 1
                    document.querySelector('#harga').value = btnBeli.dataset.harga
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

        document.addEventListener('DOMContentLoaded', () => {
            // Get all buttons with the class 'change-role-btn'
            const changeRoleButtons = document.querySelectorAll('.change-role-btn');
            let selectedTiketID = null;

            changeRoleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Get user ID and role from the data attributes
                    selectedTiketID = button.getAttribute('data-id');

                    // Show SweetAlert2 confirmation dialog
                    swal({
                        title: 'Pembatalan Pesanan',
                        text: `Anda yakin ingin membatalkan pesanan?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3f51b5',
                        cancelButtonColor: '#ff4081',
                        confirmButtonText: 'Great ',
                        buttons: {
                            cancel: {
                                text: "Cancel",
                                value: null,
                                visible: true,
                                className: "btn btn-danger",
                                closeModal: true,
                            },
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary",
                                closeModal: true
                            }
                        }
                    }).then((result) => {
                        if (result) {
                            // Perform the AJAX request to change the role using Fetch API
                            fetch("{{ route('cancel-pesanan') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: new URLSearchParams({
                                        id: selectedTiketID,
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        location.reload()
                                        // Show success alert
                                        showSwal('success-message')
                                    } else {
                                        throw new Error('Something went wrong');
                                    }
                                })
                                .catch(error => {
                                    swal({
                                        title: 'Ada Kesalahan',
                                        text: 'Terdapat error silakan periksa',
                                        icon: 'error',
                                        button: {
                                            text: "ok",
                                            value: true,
                                            visible: true,
                                            className: "btn btn-primary"
                                        }
                                    })
                                    console.error('Error:', error);
                                });
                        }
                    });
                });
            });
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
