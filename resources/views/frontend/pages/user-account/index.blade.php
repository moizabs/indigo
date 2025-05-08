@extends('frontend.layouts.app')
@section('title', 'User Account')
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(frontend/assets/images/backgrounds/new-header-01.jpeg)">
        </div>
        <div class="page-header__ripped-paper"
            style="background-image: url(frontend/assets/images/shapes/page-header-ripped-paper.png);"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>/</span></li>
                    <li>Shop</li>
                </ul>
                <h2>My account</h2>
            </div>
        </div>
    </section>
    <section class="account">
        <div class="container">
            <div class="account__main-tab-box tabs-box">
                <ul class="tab-buttons clearfix list-unstyled">
                    <li data-tab="#login" class="tab-btn"><span>Login</span></li>
                    <li data-tab="#register" class="tab-btn active-btn"><span>Register</span></li>
                </ul>
                <div class="tabs-content">
                    <!-- Login Tab -->
                    <div class="tab" id="login">
                        <div class="account__main-tab-inner">
                            <form action="{{ route('login') }}" method="POST" class="account__form">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username <span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative account__form-input-box">
                                        <input type="text" class="form-control password-input" name="email"
                                            id="username" placeholder="Enter username" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="float-end">
                                        <a href="auth-pass-reset.html" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label class="form-label" for="password-input">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup mb-3 account__form-input-box">
                                        <input type="password" class="form-control pe-5 password-input "
                                            placeholder="Enter password" name="password" id="password-input" required>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                </div>

                                {{-- <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                </div> --}}
                                <div class="contact-page__btn-box">
                                    <button type="submit" class="thm-btn contact-page__btn">Sign In</button>
                                </div>
                                {{-- <div class="mt-4 pt-2 text-center">
                                    <div class="signin-other-title position-relative">
                                        <h5 class="fs-md mb-4 title">Sign In with</h5>
                                    </div>
                                    <div class="pt-2 hstack gap-2 justify-content-center">
                                        <button type="button" class="btn btn-subtle-primary btn-icon"><i
                                                class="ri-facebook-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-danger btn-icon"><i
                                                class="ri-google-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-dark btn-icon"><i
                                                class="ri-github-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-info btn-icon"><i
                                                class="ri-twitter-fill fs-lg"></i></button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>

                    <!-- Register Tab -->
                    <div class="tab active-tab" id="register">
                        <div class="account__main-tab-inner">
                            <form class="needs-validation account__form" novalidate action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3 account__form-input-box">
                                    <label for="username" class="form-label">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="username"
                                        placeholder="Enter username" required>
                                    <div class="invalid-feedback">
                                        Please enter username
                                    </div>
                                </div>

                                <div class="mb-3 account__form-input-box">
                                    <label for="useremail" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" id="useremail"
                                        placeholder="Enter Email" required>
                                    <div class="invalid-feedback">
                                        Please enter email
                                    </div>
                                </div>

                                <div class="mb-3 account__form-input-box">
                                    <label class="form-label" for="password-input">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control password-input pe-5" name="password"
                                            onpaste="return false" placeholder="Enter password" id="password-input"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 account__form-input-box">
                                    <label class="form-label" for="password-input">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control password-input pe-5"
                                            name="password_confirmation" onpaste="return false"
                                            placeholder="Enter password" id="password-input"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        <button
                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                            type="button" id="password-addon"><i
                                                class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-0 fs-xs text-muted fst-italic">By registering you agree to the Indigo <a
                                            href="pages-term-conditions.html"
                                            class="text-primary text-decoration-underline fst-normal fw-medium">Terms of
                                            Use</a></p>
                                </div>

                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                    <h5 class="fs-sm">Password must contain:</h5>
                                    <p id="pass-length" class="invalid fs-xs mb-2">Minimum <b>8 characters</b></p>
                                    <p id="pass-lower" class="invalid fs-xs mb-2">At <b>lowercase</b> letter (a-z)</p>
                                    <p id="pass-upper" class="invalid fs-xs mb-2">At least <b>uppercase</b> letter (A-Z)
                                    </p>
                                    <p id="pass-number" class="invalid fs-xs mb-0">A least <b>number</b> (0-9)</p>
                                </div>

                                <div class="contact-page__btn-box">
                                    <button type="submit" class="thm-btn contact-page__btn">Sign Up</button>
                                </div>
                                {{-- <div class="mt-4 text-center">
                                    <div class="signin-other-title position-relative">
                                        <h5 class="fs-sm mb-4 title text-muted">Create account with</h5>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-subtle-primary btn-icon "><i
                                                class="ri-facebook-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-danger btn-icon "><i
                                                class="ri-google-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-dark btn-icon "><i
                                                class="ri-github-fill fs-lg"></i></button>
                                        <button type="button" class="btn btn-subtle-info btn-icon "><i
                                                class="ri-twitter-fill fs-lg"></i></button>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <!--tab-->
                </div>
            </div>
        </div>
    </section>

    <!--Account End-->
    <!--Subscribe One Start-->
    @include('frontend.partials.subscribe')
    <!--Subscribe One End-->
@endsection
