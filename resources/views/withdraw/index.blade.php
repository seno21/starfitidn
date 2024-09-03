@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="font-bold">List Tiket Untuk Event Ini</h3>
                        <hr class="border border-primary border-5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Withdraw
                        </button>
                        <button type="button" class="btn btn-danger mb-2" id="batal-witdraw">
                            Tutup
                        </button>
                        <script>
                            $(document).ready(function() {
                                $('#batal-witdraw').click(function() {
                                    location.assign('{{ route('dashboard') }}')
                                })
                            })
                        </script>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Detail Penarikan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="tiketForm" method="POST" action="{{ route('event.eom.insertTiket') }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="id" id="tiket_id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah Penarikan</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp.</span>
                                                            </div>
                                                            <input type="text"
                                                                class="form-control @error('jumlah') is-invalid @enderror"
                                                                name="jumlah" id="jumlah" value="{{ old('jumlah') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_penarikan">Tanggal Penarikan</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control @error('tgl_penarikan') is-invalid @enderror"
                                                                name="tgl_penarikan" id="tgl_penarikan"
                                                                value="{{ old('tgl_penarikan', now()->format('Y-m-d')) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="keterangan">Keterangan Penarikan Dana</label>
                                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                                            rows="6" placeholder="Isikan syarat dan ketentuan acara">{{ old('keterangan') }}</textarea>
                                                        @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                id="btn-batal">Batal</button>
                                            <button type="submit" class="btn btn-primary" id="btn-submit">Buat
                                                Tiket</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                            <script>
                                $(document).ready(function() {
                                    var myModal = new bootstrap.Modal($('#staticBackdrop')[0]);
                                    myModal.show();
                                });
                            </script>
                        @endif
                        <div class="table-responsive">
                            <table id="tikets-table" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Jumlah Penarikan</th>
                                        <th>Tanggal</th>
                                        <th>Biaya Penarikan</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Otomatis di isi oleh yajra datatable --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Format inputan mata uang
        $(document).ready(function() {
            $('#harga').on('keyup', function() {
                $(this).val(formatRupiah($(this).val()));
            });

        });

        function formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }
    </script>
@endsection()
