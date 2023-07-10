@extends('layouts.master-without-nav')

@section('title')
@lang('translation.Login')
@endsection

@section('css')
<!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

<style>
 .bg-overlay  {background:url(/build/images/bene.jpg);background-size:cover;background-repeat:no-repeat;background-position:center;}
</style>

@endsection

@section('body')

<body class="auth-body-bg">


    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                {{-- <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">5k</span>+ Satisfied clients</h4> --}}

                                                <div>
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        {{-- <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Fantastic theme with a
                                                                    ton of options. If you just want the HTML to
                                                                    integrate with your project, then this is the
                                                                    package. You can find the files in the 'dist'
                                                                    folder...no need to install git and all the other
                                                                    stuff the documentation talks about. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div> --}}

                                                        {{-- <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" If Every Vendor on Envato
                                                                    are as supportive as Themesbrand, Development with
                                                                    be a nice experience. You guys are Wonderful. Keep
                                                                    us the good work. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100" >
                                <div class="mb-4 mb-md-5">
                                    <a href="index" class="d-block auth-logo" style="text-align: center">
                                        <img src="{{ asset('/build/images/logo123.png') }}" alt="" height="80">
                                        <img src="{{ asset('/build/images/logo123.pngg') }}" alt="" height="80">
                                    </a>
                                </div>

                                @error('error')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="my-auto">

                                    <div style="text-align: center">
                                        <h5 class="text-primary">اهلا بك !</h5>
                                        <p class="text-muted">تسجيل الدخول إلي بنسايز</p>
                                    </div>

                                    <div class="mt-4">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="username" class="form-label">البريد الالكتروني</label>
                                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'admin@themesbrand.com') }}" id="username" placeholder="Enter Email" autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">

                                                </div>
                                                <label class="form-label">كلمة السر</label>
                                                <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" value="123456" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div>
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted">نسيت كلمة السر؟</a>
                                                @endif

                                            </div>
                                            <div class="form-check" style="text-align: right; margin-right:10px;direction:right">
                                                <input class="form-check-input" dir="rtl"  type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                  تذكرني
                                                </label>
                                              </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" style="background-color: #32a39f" type="submit">دخول </button>
                                            </div>

                                            {{-- <div class="mt-4 text-center">
                                                <h5 class="font-size-14 mb-3">تسجيل دخول بــ</h5>

                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="social-list-item bg-primary text-white border-primary">
                                                            <i class="mdi mdi-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="social-list-item bg-info text-white border-info">
                                                            <i class="mdi mdi-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="social-list-item bg-danger text-white border-danger">
                                                            <i class="mdi mdi-google"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </form>
                                        {{-- <div class="mt-5 text-center">
                                            <p>ليس لديك ايميل ؟ <a href="{{ url('register') }}" class="fw-medium text-primary"> سجل الان </a> </p>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                        Themesbrand</p>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @endsection
    @section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/build/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/build/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection
