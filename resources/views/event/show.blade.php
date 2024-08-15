@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-10">
                        <h4 class="card-title font-bold">Detail Event</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Anu
                    </div>
                    {{-- <div class="col-md-3">
                        <h4>BUAT KATEGORI UNTUK EVENT INI</h4>
                        <hr class="border border-5 border-primary">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="jarak">Jarak</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="jarak" id="jarak">
                                    <div class="input-group-append">
                                        <span class="input-group-text">KM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="usia" id="usia">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TAHUN</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label class="col-form-label">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="kelamin" value="L"
                                                    checked>
                                                Laki-laki
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="kelamin"
                                                    value="P">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary mb-3">Tambah Kategori</button>
                            </div>
                        </form>
                    </div> --}}
                </div>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Tambahkan Tiket
                        </button>

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
                                    <form method="POST" action="{{ route('event.eom.insertTiket') }}">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="id_event" value="{{ $id_event }}">
                                                <div class="form-group">
                                                    <label for="tiket">Nama Promo Tiket</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('tiket') is-invalid @enderror"
                                                            name="tiket" id="tiket" value="{{ old('tiket') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori </label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('kategori') is-invalid @enderror"
                                                            name="kategori" id="kategori" value="{{ old('kategori') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="quota">Quota Peserta</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('acara') is-invalid @enderror"
                                                            name="quota" id="quota" value="{{ old('quota') }}">
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
                                                                class="form-control @error('acara') is-invalid @enderror"
                                                                name="tgl_mulai" id="tgl_mulai"
                                                                value="{{ old('tgl_mulai') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_selesai">Tanggal Periode Selesai</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control @error('acara') is-invalid @enderror"
                                                                name="tgl_selesai" id="tgl_selesai"
                                                                value="{{ old('tgl_selesai') }}">
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
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Buat Tiket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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



    <script>
        // Format inputan mata uang
        $(document).ready(function() {
            $('#harga').on('keyup', function() {
                $(this).val(formatRupiah($(this).val()));
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
        });


        $(document).ready(function() {
            $("#tikets-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('event.eom.show', $id_event) }}",
                columns: [{
                        data: "nama_promo",
                        name: "nama_promo",
                    },
                    {
                        data: "kategori",
                        name: "kategori",
                    },
                    {
                        data: "tgl_mulai",
                        name: "tgl_mulai",
                    },
                    {
                        data: "tgl_selesai",
                        name: "tgl_selesai",
                    },
                    {
                        data: "quota",
                        name: "quota",
                    },
                    {
                        data: "harga",
                        name: "harga",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        });
    </script>
@endsection()
