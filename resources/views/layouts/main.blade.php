<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/summernote/summernote.min.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    {{-- Test --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('vendors/summernote/summernote.min.js') }}"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials.topbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('partials.sidebar')
            <div class="main-panel">
                <!-- partial -->
                @yield('content_backend')

                @include('partials.footer')
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    {{-- weet-alert  --}}
    @include('sweetalert::alert')

    <!-- plugins:js -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    {{-- <script src="{{ asset('js/form-validation.js') }}"></script> --}}
    <!-- End custom js for this page-->

    <script>
        // load image preview
        function viewImage() {
            const gambar = document.querySelector('#poster');
            const imgPreview = document.querySelector('#posterView');

            const oFReader = new FileReader();
            // Jika gambar ada
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }


        // Delete alert confirm
        $(document).on('click', '#btnDelete', function(e) {
            e.preventDefault();
            let form = $(this).parents('form');

            Swal({
                title: 'Yakin menghapus ini ?',
                text: "Data tidak bisa di kembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1BCFB4',
                cancelButtonColor: '#FE7C96',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                    //Disini bisa di masukan swal (sweetalert2)
                } else {
                    Swal.close()
                }

            })
        })
    </script>
</body>

</html>
