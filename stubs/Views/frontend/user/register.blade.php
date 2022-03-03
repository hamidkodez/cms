@extends('frontend.layouts.app')
@section('title') {{'Sign Up'}} @endsection
@section('page_title')<span class="eng-txt">Sign Up</span><span class="ar-txt">تسجيل جديد</span> @endsection
@section('keywords') {{'Sign Up'}} @endsection
@section('description') {{'Sign Up'}} @endsection
@section('canonical'){{ Request::url() }}@endsection
@section('style')@endsection

@section('content')
    <div class="container-fluid signup-section">
        <div class="row">
            <div class="col-lg-6 col-md-12 col text-center col signup-left min-vh-100">
                <img class="signin" src="{{ asset('public/assets/frontend/images/form-sigin.png') }}">
            </div>
            <div class="col-lg-6 col-md-12 col p-4 px-5 signup-black signup-right min-vh-100">
                <form class="row g-3" method="POST" action="{{ route('register') }}" id="register">
                    @csrf
                    <div class="col-12 form-group text-center my-4">
                        <h2>
                            <span class="create-an text-white">
                                <span class="eng-txt">Create an Account</span>
                                <span class="ar-txt">انشئ حساب</span>
                            </span>
                        </h2>
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label class="phone form-label" for="phone">
                            <span class="eng-txt">Phone Number</span>
                            <span class="ar-txt">رقم الهاتف</span>
                        </label>
                        <input class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="+996 000-0000" name="phone" type="text">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label class="password form-label" for="password">
                            <span class="eng-txt">Password</span>
                            <span class="ar-txt">كلمه السر</span>
                        </label>
                        <div class="input-group-append">
                            <input class="form-control @error('password') is-invalid @enderror" placeholder="*************" id="password" name="password" type="password">
                            <span class="input-group-text" onclick="password_show_hide(this);" data-id="password">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 form-group mb-3">
                        <label class="vpassword form-label" for="password_confirmation">
                            <span class="eng-txt">Verify Password</span>
                            <span class="ar-txt">اكد كلمة المرور</span>
                        </label>
                        <div class="input-group-append">
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="*************" id="password_confirmation" name="password_confirmation" type="password">
                            <span class="input-group-text" onclick="password_show_hide(this);" data-id="password_confirmation">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 form-group already-account">
                        <div class="already-account-box"></div>
                        <h5>
                            <a href="{{ route('login') }}">
                                <span class="already">
                                    <span class="eng-txt">Already Have an Account?</span>
                                    <span class="ar-txt">هل لديك حساب؟</span>
                                </span>
                            </a>
                        </h5>
                    </div>
                    <div class="col-12 form-group">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 p-0">
                            <span class="wpcf7-list-item first form-check my-2 p-0">
                                <input type="checkbox" id="remember" name="remember">
                                <label class="chekboxMainText ms-4" for="remember">
                                    <span class="cnv-name by-creating">
                                        <span class="eng-txt">By creating an account, you affirm you have read and agree to our terms of service.</span>
                                        <span class="ar-txt">من خلال إنشاء حساب ، فإنك تؤكد أنك قد قرأت شروط الخدمة الخاصة بنا ووافقت عليها.</span>
                                    </span>
                                </label>
                            </span>
                            </div>
                            <div class="col-lg-5 col-md-12 p-0">
                                <button class="btn btn-primary text-white" type="submit">
                                    <span class="signup">
                                        <span class="eng-txt">Sign Up</span>
                                        <span class="ar-txt">تسجيل جديد</span>
                                    </span>
                                    <img class="right-arrow" src="{{ asset('public/assets/frontend/images/right-arrow.png') }}">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('flashy::message')
    <script type="text/javascript">
        $("#register").validate({
            rules: {
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
            },
            messages: {
                phone: {
                    required: "Please enter your phone",
                },
                password: {
                    required: "Please enter your password",
                },
                password_confirmation: {
                    required: "Please confirm your password",
                    equalTo: "Please enter same password",
                },
            },
        });
    </script>
    <script></script>
@endsection
