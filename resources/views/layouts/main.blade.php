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
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/summernote/summernote.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <!-- include simplemde css/js -->
    <link href="{{ asset('vendors/trix-main/trix.css') }}" rel="stylesheet">
    <script src="{{ asset('vendors/trix-main/trix.js') }}"></script>
    <script>
        // DIsable attach file
        $(document).on('trix-file-accept', function(e) {
            e.preventDefault(); // Prevent the file from being attached
            alert("File attachment is not allowed!");
        });
    </script>
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


    {{-- Notifikasi --}}
    @if (session('success'))
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
            })
        </script>
    @endif


    @if (session('error'))
        <script>
            $(document).ready(function() {
                swal({
                    title: 'error',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            })
        </script>
    @endif

    @if (session('info'))
        <script>
            $(document).ready(function() {
                swal({
                    title: 'info',
                    text: '{{ session('info') }}',
                    icon: 'info',
                    confirmButtonText: 'OK'
                })
            })
        </script>
    @endif




    <!-- plugins:js -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/data-table.js') }}"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>


    <script>
        // ALERTING Delete alert confirm
        $(document).on('click', '#btnDel', function(e) {
            e.preventDefault();
            let form = $(this).parents('form');

            swal({
                    title: "Yakin Hapus Event Ini?",
                    text: "Data yg dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Berhasil Hapus Event!", {
                            icon: "success",
                        });
                        form.submit();
                    }
                });
        })

        // Simplemde
        var simplemde = new SimpleMDE({
            element: $("#deskripsi")[0]
        });

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

        // Load multiple image previews
        function viewImages() {
            const $gambar = $('#galeri'); // Input element with multiple images
            const $imgPreviewContainer = $('#galeriViewContainer'); // Container for image previews

            $imgPreviewContainer.empty(); // Clear previous previews

            const files = $gambar[0].files;

            $.each(files, function(index, file) {
                const oFReader = new FileReader();

                oFReader.readAsDataURL(file);

                oFReader.onload = function(oFREvent) {
                    const $imgElement = $('<img>'); // Create a new img element using jQuery
                    $imgElement.attr('src', oFREvent.target.result);
                    $imgElement.css({
                        'max-width': '250px',
                        'max-height': '250px',
                        'margin': '5px',
                        'border-radius': '5px',
                        'shadow': '2px 3px 15px;'
                    });
                    $imgPreviewContainer.append($imgElement);
                }
            });
        }
    </script>
</body>

</html>
