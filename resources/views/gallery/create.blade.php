@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">EVENT FORM</h4>
            <form id="eventForm" class="form-sample" action="{{ route('gallery.img.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Poster Acara</label>
                            <img class="rounded d-block m-3 col-md-4" id="posterView">
                            <input type="file" name="galeri[]" multiple class="file-upload-default" id="poster"
                                onchange="viewImage()">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control @error('poster') is-invalid @enderror file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Browse</button>
                                </span>
                                @error('poster')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary mr-2">Upload Gambar</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
