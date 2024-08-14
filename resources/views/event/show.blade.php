@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-10">
                        <h4 class="card-title font-bold">Detail Event</h4>
                    </div>
                    {{-- <div class="col-md-2">
                        <a href="{{ route('event.eom.create') }}" class="btn btn-primary btn-block btn-rounded btn-fw">Detail
                            Event</a>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-9">
                        Anu
                    </div>
                    <div class="col-md-3">
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
                    </div>
                </div>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="event-listing" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Jarak Lari</th>
                                    <th>Usia Peserta</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document)
    </script> --}}
@endsection()
