@extends('layouts.guest')

@section('content')
    <section
        class="auth-page-wrapper p-2 p-lg-4 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="card mb-0 w-100 p-3 p-lg-2"
            style="background-image: url('{{ asset('backend/assets/images/auth/auth.jpg') }}');background-size: cover;background-position: center;">
            <div class="effect-one"></div>
            <div class="row g-0 align-items-center">
                <div class="col-xxl-8 order-last order-xl-first">
                    <div class="card auth-card border-0 shadow-none mb-0 bg-transparent">
                        <div class="card-body p-4 p-xl-5 d-flex justify-content-between flex-column h-100">

                            <div class="text-center mt-auto">
                                <p class="mb-0 mt-3 text-white">
                                    &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Dosix. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                    by Themesbrand
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-4 mx-auto">
                    <div class="card shadow-lg border-none m-lg-5">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-4 pb-2">
                                    <a href="index.html" class="auth-logo">
                                        <img src="assets/images/logo-dark.png" alt="" height="30"
                                            class="auth-logo-dark mx-auto">
                                        <img src="assets/images/logo-light.png" alt="" height="30"
                                            class="auth-logo-light mx-auto">
                                    </a>
                                </div>
                                <h5 class="fs-3xl">Create your free account</h5>
                                <p class="text-muted">Get your free Dosix account now</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form class="needs-validation" novalidate action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="useremail"
                                            placeholder="Enter email address" required>
                                        <div class="invalid-feedback">
                                            Please enter email
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="username"
                                            placeholder="Enter username" required>
                                        <div class="invalid-feedback">
                                            Please enter username
                                        </div>
                                    </div>

                                    <div class="mb-3">
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

                                    <div class="mb-3">
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
                                        <p class="mb-0 fs-xs text-muted fst-italic">By registering you agree to the Dosix <a
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

                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                    </div>

                                    <div class="mt-4 text-center">
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
                                    </div>
                                </form>

                                <div class="mt-5 text-center">
                                    <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
                                            class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </section>
@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
