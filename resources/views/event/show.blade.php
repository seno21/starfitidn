@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h2 class="font-bold">DETAIL EVENT</h2>
                        <hr class="border border-primary border-5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $event->poster) }}"
                            class="img-fluid rounded-4 w-100 card-img-top shadow-lg border-0 p-2 mb-3 "
                            style="object-fit: cover; height: 500px;">
                    </div>
                    <div class="col-md-8 p-2 pr-4">
                        <div class="card p-5 shadow">
                            <h1 class="text-uppercase">{{ $event->nama_event }}</h1>
                            <hr class="border border-primary">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p class="fw-bold fs-4">
                                        WAKTU
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fs-4">
                                        @php
                                            $date = strtotime($event->waktu_pelaksanaan);
                                            echo date('d/m/Y h:i', $date);
                                        @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p class="fw-bold fs-4">
                                        LOKASI
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fs-4">
                                        {{ $event->lokasi }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p class="fw-bold fs-4">
                                        PENYELENGGARA
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fs-4">
                                        {{ $event->penyelenggara }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p class="fw-bold fs-4">
                                        KONTAK
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="fs-4">
                                        {{ $event->kontak }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <p class="fs-4">
                                        <span
                                            class="bagde badge-sm rounded-5 text-light p-1 px-3 {{ $event->status == 'ongoing' ? 'bg-success' : ($event->status == 'upcoming' ? 'bg-warning' : 'bg-danger') }}">{{ $event->status }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="font-bold">List Tiket Untuk Event Ini</h3>
                        <hr class="border border-primary border-5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        @php
                            $today = \Carbon\Carbon::now();
                            $eventDate = \Carbon\Carbon::parse($event->waktu_pelaksanaan);
                        @endphp

                        @if ($eventDate->greaterThanOrEqualTo($today))
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Tambahkan Tiket
                            </button>
                        @else
                            <button type="button" class="btn btn-secondary mb-2" disabled>
                                Tambahkan Tiket (Tidak Tersedia)
                            </button>
                        @endif

                        <button type="button" class="btn btn-danger mb-2" id="tutup-tiket">
                            Tutup
                        </button>
                        <script>
                            $(document).ready(function() {
                                $('#tutup-tiket').click(function() {
                                    location.assign('{{ route('event.eom.index') }}')
                                })
                            })
                        </script>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Tiket Untuk Event Ini
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="tiketForm" method="POST" action="{{ route('event.eom.insertTiket') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="id_event" value="{{ $id_event }}">
                                        <input type="hidden" name="id" id="tiket_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="tiket">Nama Promo Tiket</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('tiket') is-invalid @enderror"
                                                            name="tiket" id="tiket" value="{{ old('tiket') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('kategori') is-invalid @enderror"
                                                            name="kategori" id="kategori"
                                                            value="{{ old('kategori') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="quota">Quota Peserta</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('quota') is-invalid @enderror"
                                                            name="quota" id="quota" value="{{ old('quota') }}"
                                                            inputmode="numeric" pattern="\d*"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">ORANG</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_mulai">Tanggal Periode Mulai</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control @error('tgl_mulai') is-invalid @enderror"
                                                                name="tgl_mulai" id="tgl_mulai"
                                                                value="{{ old('tgl_mulai', now()->format('Y-m-d')) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_selesai">Tanggal Periode Selesai</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control @error('tgl_selesai') is-invalid @enderror"
                                                                name="tgl_selesai" id="tgl_selesai"
                                                                value="{{ old('tgl_selesai', \Carbon\Carbon::parse($event->waktu_pelaksanaan)->format('Y-m-d')) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga Tiket</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('harga') is-invalid @enderror"
                                                            name="harga" id="harga" value="{{ old('harga') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                id="btn-batal">Batal</button>
                                            <button type="submit" class="btn btn-primary" id="btn-submit">Buat
                                                Tiket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                            <script>
                                $(document).ready(function() {
                                    var myModal = new bootstrap.Modal($('#staticBackdrop')[0]);
                                    myModal.show();
                                });
                            </script>
                        @endif
                        <div class="table-responsive">
                            <table id="tikets-table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Nama Promo tiket</th>
                                        <th>Kategori Tiket</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Quota Peserta</th>
                                        <th>Harga Tiket</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Otomatis di isi oleh yajra datatable --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Format inputan mata uang
        $(document).ready(function() {
            $('#harga').on('keyup', function() {
                $(this).val(formatRupiah($(this).val()));
            });

        });

        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }

        $(document).ready(function() {
            $(document).on('click', '.edit-tiket', function() {
                // Ambil data dari atribut tombol edit
                var id = $(this).data('id');
                var nama_promo = $(this).data('nama_promo');
                var kategori = $(this).data('kategori');
                var quota = $(this).data('quota');
                var tgl_mulai = $(this).data('tgl_mulai');
                var tgl_selesai = $(this).data('tgl_selesai');
                var harga = $(this).data('harga');

                // Isi form modal dengan data yang diambil
                $('#tiket').val(nama_promo);
                $('#kategori').val(kategori);
                $('#quota').val(quota);
                $('#tgl_mulai').val(tgl_mulai);
                $('#tgl_selesai').val(tgl_selesai);
                $('#harga').val(harga);
                $('#tiket_id').val(id); // Set hidden ID for updating

                // Ubah form action agar mengarah ke rute update dengan ID tiket
                $('#tiketForm').attr('action', '{{ route('event.eom.updateTiket', '') }}/' + id);
                $('#tiketForm').find('input[name="_method"]').val('PUT');

                $('#btn-submit').text('Update Tiket');

                // Tampilkan modal
                $('#staticBackdrop').modal('show');
            });

            $('#btn-submit').click(function() {
                // Reset form
                // $('#tiketForm').attr('action', '{{ route('event.eom.insertTiket') }}');
                // $('#tiketForm').find('input[name="_method"]').val('POST');
                // $('#tiketForm')[0].reset();
                // $('#tiket_id').val(''); // Clear hidden input
            });
        });


        $(document).ready(function() {
            $("#tikets-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('event.eom.show', $id_event) }}",
                columns: [{
                        data: "nama_promo",
                        name: "Nama Promo tiket",
                    },
                    {
                        data: "kategori",
                        name: "Kategori Tiket",
                    },
                    {
                        data: "tgl_mulai",
                        name: "Periode Mulai",
                    },
                    {
                        data: "tgl_selesai",
                        name: "Periode Selesai",
                    },
                    {
                        data: "quota",
                        name: "Quota Peserta",
                    },
                    {
                        data: "harga",
                        name: "Harga Tiket",
                        render: function(data, type, row) {
                            return formatRupiah(data.toString(), 'Rp. ');
                        }
                    },
                    {
                        data: "action",
                        name: "Action",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        });
    </script>
@endsection()
