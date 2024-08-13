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
                        <div class="table-responsive">
                            <table id="event-listing" class="table">
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
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->nama_event }}</td>
                                            <td>{{ $event->waktu_pelaksanaan }}</td>
                                            <td>{{ $event->penyelenggara }}</td>
                                            <td>{{ $event->kategori }}</td>
                                            <td>{{ $event->status }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('event.eom.edit', $event->id) }}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger" id="btnDelete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document)
    </script> --}}
@endsection()
