@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">EVENT FORM</h4>
            <form action="{{ route('event.eom.store') }}" class="form-sample" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acara">Nama Acara</label>
                            <input type="text" class="form-control" id="acara" placeholder="Aerobik Seru"
                                name="acara">
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Pelaksanaan</label>
                            <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Acara</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" rows="6" placeholder="Jl. Jendral Sudirman, No. 3"></textarea>
                            {{-- <textarea id="summernote" name="summernote"></textarea> --}}
                        </div>
                        <div class="form-group">
                            <label for="cp">No. Telepon / WhatsApp</label>
                            <input type="text" class="form-control" id="cp" placeholder="08xxxxxx" name="telepon">
                        </div>
                        <div class="form-group">
                            <label>Poster Acara</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image" name="poster">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penyelenggara">Penyelengara Acara</label>
                            <input type="text" class="form-control" id="penyelenggara" placeholder="Starfit Indonesia"
                                name="penyelenggara">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="d-flex">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori" id="L"
                                                value="lari" checked>
                                            Event Lari
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori" id="P"
                                                value="non-lari">
                                            Event Non-Lari
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Acara</label>
                            <select class="form-control" id="status" name="status">
                                <option value="ongoing">Ongoing</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="ended">Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Acara</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" placeholder="Isikan detail acara"></textarea>
                            {{-- <textarea id="summernote" name="summernote"></textarea> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mr-2">Buat Event</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection()
