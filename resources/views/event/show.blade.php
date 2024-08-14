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
                                    <div class="modal-body">
                                        <div class="row">
                                            <form method="POST" action="{{ route('event.eom.insertTiket', $id_event) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="tiket">Nama Promo Tiket</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="tiket"
                                                            id="tiket">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="quota">Quota Peserta</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="quota"
                                                            id="quota">
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
                                                        <input type="date" class="form-control" name="tgl_mulai"
                                                            id="tgl_mulai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tgl_selesai">Tanggal Periode Selesai</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="tgl_selesai"
                                                            id="tgl_selesai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga Tiket</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="harga"
                                                        id="harga">
                                                </div>
                                            </div>

                                            </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Buat Tiket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="tikets-table" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Jarak Lari</th>
                                    <th>Usia Peserta</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>cell</td>
                                    <td>cell</td>
                                    <td>cell</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary"><i class="mdi mdi-ticket"></i></a>
                                        <a href="" class="btn btn-sm btn-success"><i
                                                class="mdi mdi-pencil-box-outline"></i></a>
                                        <a href="" id="btnDelete" class="btn btn-sm btn-danger"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr> --}}
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
                        data: "gtl_mulai",
                        name: "tgl_mulai",
                    },
                    {
                        data: "gtl_selesai",
                        name: "gtl_selesai",
                    },
                    {
                        data: "quota",
                        name: "quota",
                    },
                    {
                        data: "harga_tiket",
                        name: "harga_tiket",
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
