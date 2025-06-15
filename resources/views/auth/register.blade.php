<x-guest-layout>

    <head>
        <title>Registrasi</title>
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
                            <h4>Belum ada akun?</h4>
                            <h6 class="font-weight-light">Daftar dengan mudah. hanya lakukan beberapa langah saja</h6>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                                    <x-text-input id="name" class="block mt-1 w-full form-control form-control"
                                        type="text" name="name" :value="old('name')" required autofocus
                                        autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email"
                                        name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4 position-relative">
                                    <x-input-label for="password" :value="__('Password')" />

                                    <div style="position: relative;">
                                        <x-text-input id="password" class="block mt-1 w-full form-control pr-10"
                                            type="password" name="password" required autocomplete="new-password" />

                                        {{-- Ikon Mata --}}
                                        <span onclick="togglePassword()"
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                            <i class="mdi mdi-eye" id="eyeIcon"></i>
                                        </span>
                                    </div>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>


                                <!-- Confirm Password -->
                                <div class="mt-4 position-relative">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <div style="position: relative;">
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                                            type="password" name="password_confirmation" required
                                            autocomplete="new-password" />
                                        {{-- Ikon Mata --}}
                                        <span onclick="togglePassword()"
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                            <i class="mdi mdi-eye" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('login') }}">
                                        {{ __('Sudah punya akun?') }}
                                    </a>

                                    <button type="submit"
                                        class="ms-4 mt-3 btn btn-block btn-primary btn-md font-weight-medium auth-form-btn">
                                        {{ __('Daftar') }}
                                    </button>
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
        function togglePassword() {
            const input = document.getElementById("password");
            const inputDua = document.getElementById("password_confirmation");
            const eyeIcon = document.getElementById("eyeIcon");

            if (input.type === "password" || inputDua.type === "password") {
                input.type = "text";
                inputDua.type = "text";
                eyeIcon.classList.remove("mdi-eye");
                eyeIcon.classList.add("mdi-eye-off");
            } else {
                input.type = "password";
                inputDua.type = "password"
                eyeIcon.classList.remove("mdi-eye-off");
                eyeIcon.classList.add("mdi-eye");
            }
        }
    </script>

</x-guest-layout>
