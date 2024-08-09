@extends('layouts.main')
@section('content_backend')
    <div class="card min-vh-100">
        <div class="card-body">
            <h4 class="card-title">EVENT FORM</h4>
            <form action="" class="form-sample">
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
                            {{-- <textarea class="form-control" name="lokasi" id="lokasi" rows="6" placeholder="Jl. Jendral Sudirman, No. 3"></textarea> --}}
                            <textarea id="summernote" name="editordata"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                        <div class="form-group">
                            <label for="penyelenggara">Penyelengara Acara</label>
                            <input type="text" class="form-control" id="penyelenggara" placeholder="Starfit Indonesia"
                                name="penyelenggara">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Gender</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection()
