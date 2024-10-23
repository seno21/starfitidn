@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h4 class="card-title fs-3">Profit Event</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">
                        <div class="col-md-6">
                            <form id="eventForm" class="form-sample" action="{{ route('event.eom.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="event">Pilih Event</label>
                                    <div class="d-flex align-items-center">
                                        <select class="form-control mr-2" id="event" name="event">
                                            <option value="ongoing">Ongoing</option>
                                        </select>
                                        <select class="form-control mr-2" id="kategori" name="kategori">
                                            <option value="ongoing">Ongoing</option>
                                        </select>
                                        <button class="file-upload-browse btn btn-primary ml-2"
                                            type="button">Filter</button>
                                        <button class="file-upload-browse btn btn-success ml-2 mr-5" type="button"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">Transaksi</button>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Tiket
                                                            Untuk Event Ini
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form id="kategoriForm" method="POST" enctype="multipart/form-data"
                                                        action="{{ route('event.eom.insertKategori') }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="id" id="kategori_id">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="nama_kategori">Nama Kategori</label>
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control @error('nama_kategori') is-invalid @enderror"
                                                                            name="nama_kategori" id="nama_kategori"
                                                                            value="{{ old('nama_kategori') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gender">Gender</label>
                                                                    <select class="form-control" id="gender"
                                                                        name="gender">
                                                                        <option value="semua">Semua Gender</option>
                                                                        <option value="laki-laki">Laki-laki</option>
                                                                        <option value="perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal" id="btn-batal">Batal</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                id="btn-submit">Buat
                                                                Kategori</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="event-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Tanggal dan Waktu</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>User Verif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Di isi oleh yajra --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function() {
            $("#event-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('event.eom.index') }}",
                columns: [{
                        data: "nama_event",
                        name: "nama_event",
                    },
                    {
                        data: "waktu_pelaksanaan",
                        name: "waktu_pelaksanaan",
                    },
                    {
                        data: "penyelenggara",
                        name: "penyelenggara",
                    },
                    {
                        data: "kategori",
                        name: "kategori",
                    },
                    {
                        data: "status",
                        name: "status",
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
    </script> --}}
@endsection()
