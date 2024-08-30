@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <h4 class="card-title">LIST PESERTA EVENT </h4>
                        <a href="{{ route('event.eom.index') }}" class="btn btn-sm btn-danger">Tutup</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="transaksi-table" class="table">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nama Peserta</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Ukuran Jersey</th>
                                        <th data-priority="2">No. Telepon</th>
                                        <th>Kontak Darurat</th>
                                        <th>Email</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Di isi oleh datatable yajra --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#transaksi-table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('event.eom.peserta', $id_event) }}",
                columns: [{
                        data: "nama_lengkap",
                        name: "Nama Peserta",
                    },
                    {
                        data: "jenis_kelamin",
                        name: "Jenis Kelamin",
                    },
                    {
                        data: null,
                        name: "tgl_lahir",
                        render: function(data, type, row) {
                            return row.tempat_lahir + ", " + row.tgl_lahir;
                        }
                    },
                    {
                        data: "domisili",
                        name: "Alamat",
                    },
                    {
                        data: "ukuran_jersey",
                        name: "Ukuran Jersey",
                    },
                    {
                        data: "no_telp",
                        name: "No. Telepon",
                    },
                    {
                        data: "kontak_darurat",
                        name: "Kontak Darurat",
                    },
                    {
                        data: "email",
                        name: "Email",
                    },
                ],
            });
        });
    </script>
@endsection()
