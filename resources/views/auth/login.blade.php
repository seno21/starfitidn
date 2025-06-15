<x-guest-layout>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    </head>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded">
                            <div class="brand-logo text-center">
                                <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                            </div>
                            <h4>Selamat Datang di Starfit IDN</h4>
                            <h6 class="font-weight-light">Silakan Login</h6>
                            <form class="pt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Username" name="email">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                {{-- <div class="form-group mt-3">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div> --}}
                                <div class="form-group mt-3 position-relative">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">

                                    {{-- Icon Mata --}}
                                    <span class="position-absolute" onclick="togglePasswordVisibility()"
                                        style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;">
                                        <i class="mdi mdi-eye" id="toggleEyeIcon"></i>
                                    </span>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-md font-weight-bold auth-form-btn">LOG
                                        IN</button>
                                </div>
                                <div class="text-center mt-3 font-weight-light">
                                    Belum Punya akun?
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('register') }}"
                                        class="btn btn-block btn-info btn-md font-weight-bold auth-form-btn">REGISTRASI</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.togglePasswordVisibility = function() {
                const passwordInput = document.getElementById("exampleInputPassword1");
                const eyeIcon = document.getElementById("toggleEyeIcon");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove("mdi-eye");
                    eyeIcon.classList.add("mdi-eye-off");
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove("mdi-eye-off");
                    eyeIcon.classList.add("mdi-eye");
                }
            }
        });
    </script>

</x-guest-layout>
