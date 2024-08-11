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
                        <a href="{{route('event.eom.create')}}" class="btn btn-primary btn-block btn-rounded btn-fw">Tambah Event</a>
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
