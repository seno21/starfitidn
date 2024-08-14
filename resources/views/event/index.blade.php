@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-10">
                        <h4 class="card-title">List Event</h4>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('event.eom.create') }}" class="btn btn-primary btn-block btn-rounded btn-fw">Tambah
                            Event</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table id="event-table" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Nama Event</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Penyelengara</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
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

    <script>
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
    </script>
@endsection()
