@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">EDIT EVENT FORM</h4>
            <form id="eventForm" class="form-sample" action="{{ route('event.eom.update', $event->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="acara">Nama Acara</label>
                            <input type="text" class="form-control @error('acara') is-invalid @enderror" id="acara"
                                placeholder="Aerobik Seru" name="acara" value="{{ $event->nama_event }}">
                            @error('acara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Pelaksanaan</label>
                            <input type="datetime-local" class="form-control @error('waktu') is-invalid @enderror"
                                id="waktu" name="waktu" value="{{ $event->waktu_pelaksanaan }}">
                            @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Acara</label>
                            <textarea class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" rows="6"
                                placeholder="Jl. Jendral Sudirman, No. 3">{{ $event->lokasi }}</textarea>
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
                                placeholder="08123456789" name="telepon" value="{{ $event->kontak }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Poster Acara</label>
                            <img class="rounded d-block m-3 col-md-4" id="posterView"
                                src="{{ asset('storage/' . $event->poster) }}">
                            <input type="file" name="poster" class="file-upload-default" id="poster"
                                onchange="viewImage()">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control @error('poster') is-invalid @enderror file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penyelenggara">Penyelengara Acara</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror"
                                id="penyelenggara" placeholder="Starfit Indonesia" name="penyelenggara"
                                value="{{ $event->penyelenggara }}">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="d-flex">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori" id="L"
                                                value="lari" {{ $event->kategori == 'lari' ? 'checked' : '' }}>
                                            Event Lari
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="kategori" id="NL"
                                                value="non-lari" {{ $event->kategori == 'non-lari' ? 'checked' : '' }}>
                                            Event Non-Lari
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Acara</label>
                            <select class="form-control" id="status" name="status">
                                <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                                <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming
                                </option>
                                <option value="ended" {{ $event->status == 'ended' ? 'selected' : '' }}>Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Acara</label>
                            <input id="deskripsi" type="hidden" name="deskripsi"
                                value="{{ old('deskripsi', $event->deskripsi) }}">
                            <trix-editor class="@error('deskripsi') is-invalid @enderror" input="deskripsi"></trix-editor>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ route('event.eom.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
