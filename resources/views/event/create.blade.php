@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">EVENT FORM</h4>
            <form id="eventForm" class="form-sample" action="{{ route('event.eom.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acara">Nama Acara</label>
                            <input type="text" class="form-control @error('acara') is-invalid @enderror" id="acara"
                                placeholder="Aerobik Seru" name="acara" value="{{ old('acara') }}">
                            @error('acara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Pelaksanaan</label>
                            <input type="datetime-local" class="form-control @error('waktu') is-invalid @enderror"
                                id="waktu" name="waktu" value="{{ old('waktu') }}">
                            @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Acara</label>
                            <textarea class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" rows="6"
                                placeholder="Jl. Jendral Sudirman, No. 3">{{ old('lokasi') }}</textarea>
                            {{-- <textarea id="summernote" name="summernote"></textarea> --}}
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cp">No. Telepon / WhatsApp</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="cp"
                                placeholder="08123456789" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Poster Acara</label>
                            <img class="rounded d-block m-3 col-md-4" id="posterView">
                            <input type="file" name="poster" class="file-upload-default" id="poster"
                                onchange="viewImage()">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control @error('poster') is-invalid @enderror file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                @error('poster')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penyelenggara">Penyelengara Acara</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                id="penyelenggara" placeholder="Starfit Indonesia" name="penyelenggara"
                                value="{{ old('penyelenggara') }}">
                            @error('penyelenggara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                                            <input type="radio" class="form-check-input" name="kategori" id="NL"
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
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                                rows="6" placeholder="Isikan detail acara">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <textarea id="summernote" name="summernote"></textarea> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mr-2">Buat Event</button>
                        <a href="{{ route('event.eom.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection()
