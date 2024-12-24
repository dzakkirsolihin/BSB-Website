<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="container row d-flex justify-content-center align-items-center g-4">
            <x-input-error :messages="$errors->get('email')" class="w-75"/>
            <!-- main login container -->
            <div class="container d-flex justify-content-center align-items-center">
                <!-- login container -->
                <div class="row border rounded-4 shadow box-area" style=" background-image: url('./assets/img/login.png');  border-radius: 50px !important;">
                    <!-- left container -->
                    <div class="col-md-6 d-flex justify-content-center align-items-center left-box" style="background: #F2F6FF; border-radius: 47px !important;">
                        <div class="rounded-4 box1 mb-5" style="border-radius: 25px !important;">
                            <label for="exampleInputEmail1" class="d-flex justify-content-center mb-3 fs-4" style="background: linear-gradient(to left,#00CE74,#019796); -webkit-background-clip: text; -webkit-text-fill-color:transparent; font-weight:600; padding-top: -80px;">
                                Reset Password
                            </label>
                            <div class="row align-items-center bg-white rounded-4 box ms-0" style="border-radius: 25px !important;">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-3 mt-4">
                                        <label for="email" class="form-label ms-4" style="background: linear-gradient(to left,#00CE74,#019796); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">Email</label>
                                        <input type="email" class="form-control container d-flex justify-content-center" id="email" name="email" :value="old('email')" required autofocus placeholder="Masukkan Email">
                                    </div>

                                    <div class="input-group mb-3 justify-content-center">
                                        <x-primary-button class="btn btn-lg w-100 fs-4 text-white fs-2" style="background: linear-gradient(to left,#00CE74,#019796);">
                                            {{ __('Kirim Link Reset Password') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- right container -->
                    <div class="col-md-6 d-flex justify-content-center align-items-center flex-column right-box" style="background:linear-gradient(#00CE74,#019796); border-radius: 50px !important;">
                        <div class="featured-image mb-3">
                            <x-application-logo class="logo img-fluid d-inline-block align-text-top me-2"  width="200" height="200" />
                        </div>
                        <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight:600;">Baitush Sholihin</p>
                        <small class="text-white text-wrap text-center" style="width: 17rem; font-family:'Courier New', Courier, monospace;">
                            Copyright &copy;{{ date('Y') }}, Last Minute
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
