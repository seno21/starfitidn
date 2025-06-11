@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h4 class="card-title">List Kategori</h4>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="w-100 btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Tambahkan Kategori
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('event.eom.index') }}" class="w-100 btn btn-sm btn-danger">Tutup</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
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
                                    <form id="kategoriForm" method="POST" enctype="multipart/form-data"
                                        action="{{ route('event.eom.insertKategori') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="id_event" value="{{ $id_event }}">
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
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="semua"
                                                            {{ old('gender') == 'semua' ? 'selected' : '' }}>Semua Gender
                                                        </option>
                                                        <option value="laki-laki"
                                                            {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                                        </option>
                                                        <option value="perempuan"
                                                            {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="min_usia">Usia Minimal</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('min_usia') is-invalid @enderror"
                                                            name="min_usia" id="min_usia" value="{{ 0 }}"
                                                            inputmode="numeric" pattern="\d*"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Tahun</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="max_usia">Usia Maksimal</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('max_usia') is-invalid @enderror"
                                                            name="max_usia" id="max_usia" value="{{ 100 }}"
                                                            inputmode="numeric" pattern="\d*"
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Tahun</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_kategori">No Start BIB</label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control @error('start_bib') is-invalid @enderror"
                                                            name="start_bib" id="start_bib" value="{{ old('start_bib') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Design BIB</label>
                                                    <input type="file" name="img_bib" class="file-upload-default"
                                                        id="img_bib" onchange="viewImage()">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text"
                                                            class="form-control @error('img_bib') is-invalid @enderror file-upload-info"
                                                            disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">Upload</button>
                                                        </span>
                                                        @error('img_bib')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                id="btn-batal">Batal</button>
                                            <button type="submit" class="btn btn-primary" id="btn-submit">Buat
                                                Kategori</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="event-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Gender</th>
                                        <th>Minimal Usia</th>
                                        <th>Maksimal Usia</th>
                                        <th>Nomor Mulai BIB</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->nama_event }}</td>
                                        <td>{{ $event->waktu_pelaksanaan }}</td>
                                        <td>{{ $event->penyelenggara }}</td>
                                        <td>{{ $event->kategori }}</td>
                                        <td>{{ $event->status }}</td>
                                        <td>
                                            <a href="{{ route('event.eom.show', $event->id) }}"
                                                class="btn btn-sm btn-primary"><i class="mdi mdi-ticket"></i></a>
                                            <a href="{{ route('event.eom.edit', $event->id) }}"
                                                class="btn btn-sm btn-success"><i
                                                    class="mdi mdi-pencil-box-outline"></i></a>
                                            <a href="" id="btnDelete" class="btn btn-sm btn-danger"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach --}}
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
            $(document).on('click', '.edit-kategori', function() {
                // Ambil data dari atribut tombol edit
                var id = $(this).data('id');
                var nama_kategori = $(this).data('nama_kategori');
                var gender = $(this).data('gender');
                var min_usia = $(this).data('min_usia');
                var max_usia = $(this).data('max_usia');
                var start_bib = $(this).data('start_bib');

                // Isi form modal dengan data yang diambil
                $('#nama_kategori').val(nama_kategori);
                $('#gender').val(gender);
                $('#min_usia').val(min_usia);
                $('#max_usia').val(max_usia);
                $('#start_bib').val(start_bib);
                $('#kategori_id').val(id); // Set hidden ID for updating

                // Ubah form action agar mengarah ke rute update dengan ID tiket
                $('#kategoriForm').attr('action', '{{ route('event.eom.updateKategori', '') }}/' + id);
                $('#kategoriForm').find('input[name="_method"]').val('PUT');

                $('#btn-submit').text('Update Kategori');

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
            $("#event-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('event.eom.kategori', $id_event) }}",
                columns: [{
                        data: "nama_kategori",
                        name: "Nama Kategori",
                    },
                    {
                        data: "gender",
                        name: "Gender",
                    },
                    {
                        data: "min_usia",
                        name: "Usia Minimal",
                    },
                    {
                        data: "max_usia",
                        name: "Usia Maksimal",
                    },
                    {
                        data: "start_bib",
                        name: "No Mulai BIB",
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
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
        });
    </script>
@endif
