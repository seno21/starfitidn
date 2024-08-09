<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- <title>Login</title> --}}
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/font-awesome/css/font-awesome.min.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    </head>
    <body>
        {{ $slot }}
         <!-- Vendor JS Files -->
         <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
         <!-- endinject -->
         <!-- Plugin js for this page -->
         <!-- End plugin js for this page -->
         <!-- inject:js -->
         <script src="{{ asset('/js/off-canvas.js') }}"></script>
         <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
         <script src="{{ asset('/js/template.js') }}"></script>
         <script src="{{ asset('/js/settings.js') }}"></script>
         <script src="{{ asset('/js/todolist.js') }}"></script>
    </body>
</html>
