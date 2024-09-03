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
                        <div class="col-md-3">
                            <form id="eventForm" class="form-sample" action="{{ route('event.eom.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="event">Pilih Event</label>
                                    <div class="d-flex align-items-center">
                                        <select class="form-control" id="event" name="event">
                                            <option value="ongoing">Ongoing</option>
                                        </select>
                                        <button class="file-upload-browse btn btn-primary ml-2"
                                            type="button">Filter</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="event-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Pembayaran Client</th>
                                        <th>Xendit Fee + PPN</th>
                                        <th>Fee Software License</th>
                                        <th>PPH23</th>
                                        <th>Pendapatan Bersih</th>
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
