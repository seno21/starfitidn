@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title fs-4">BAGIKAN MOMEN TERBAIKMU</h4>
            <form id="eventForm" class="form-sample" action="{{ route('gallery.img.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div id="galeriViewContainer" class="m-3 rounded p-2 img-fluid"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="file" name="galeri[]" multiple class="file-upload-default" id="galeri"
                                onchange="viewImages()">
                            <div class="input-group col-xs-12">
                                <input type="text"
                                    class="form-control 
                                    @error('galeri.*') 
                                        is-invalid 
                                    @enderror 
                                    @error('galeri')
                                        is-invalid
                                    @enderror file-upload-info"
                                    disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary mdi mdi-file-find"
                                        type="button"></button>
                                </span>
                                @error('galeri.*')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('galeri')
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
                        <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-cloud-upload mr-1"></i>Upload
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="table-responsive">
                        <table id="transaksi-table" class="table">
                            <thead>
                                <tr>
                                    {{-- <th>Path</th> --}}
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gallerys as $gallery)
                                    <tr>
                                        {{-- <td>{{ $gallery->nama_foto }}</td> --}}
                                        <td>
                                            <img src="{{ asset('storage/' . $gallery->nama_foto) }}"
                                                class="img-fluid object-fit-cover rounded"
                                                style="width: 150px; height: 150px;" alt="Gallery Foto">
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('gallery.img.destroy', $gallery->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    title="Hapus gambar ini"><i class="mdi mdi-delete mr-1"></i>Delete
                                                </button>
                                            </form>
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
@endsection()
