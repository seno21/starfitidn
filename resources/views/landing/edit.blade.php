@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">Landing Image Control</h4>
            <form class="form-sample" action="{{ route('landing.update', $abouts->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="{{ $abouts->id }}">
                        <div class="form-group">
                            <label for="konten">About Us</label>
                            <textarea class="form-control @error('konten') is-invalid @enderror" name="konten" id="konten" rows="6"
                                placeholder="Jl. Jendral Sudirman, No. 3">{{ $abouts->konten }}</textarea>
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Konten</label>
                            <img class="rounded d-block m-3 col-md-4" id="thubnailView"
                                src="{{ asset('storage/' . $abouts->thumbnail) }}">
                            <input type="file" name="thumbnail" class="file-upload-default" id="thumbnail"
                                onchange="viewImage()">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control @error('thumbnail') is-invalid @enderror file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                @error('thumbnail')
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
                        <button type="submit" class="btn btn-primary mr-2">Update Konten</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
