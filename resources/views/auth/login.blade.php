<x-guest-layout>
    <head>
        <title>Login</title>
    </head>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
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
                                <div class="form-group mt-3">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btn">LOG IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Belum Punya akun? <a href="{{ route('register') }}"
                                        class="text-primary">Registrasi</a>
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
</x-guest-layout>
