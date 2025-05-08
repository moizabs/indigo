@extends('layouts.guest')

@section('content')
    <section
        class="auth-page-wrapper p-2 p-lg-4 position-relative d-flex align-items-center justify-content-center min-vh-100">
        <div class="card mb-0 w-100 p-3 p-lg-2"
            style="background-image: url('{{ asset('backend/assets/images/auth/auth.jpg') }}');background-size: cover;background-position: center;">
            <div class="effect-one"></div>
            <div class="row g-0 align-items-center">
                <div class="col-lg-8 col-xxl-4 mx-auto order-first order-xl-last">
                    <div class="card shadow-lg border-none m-lg-5">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-4 pb-2">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt=""
                                            height="30" class="auth-logo-dark mx-auto">
                                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt=""
                                            height="30" class="auth-logo-light mx-auto">
                                    </a>
                                </div>
                                <h5 class="fs-3xl">Welcome Back</h5>
                                <p class="text-muted">Sign in to continue to Dosix.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <div class="position-relative ">
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
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input "
                                                placeholder="Enter password" name="password" id="password-input" required>
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                    </div>

                                    <div class="mt-4 pt-2 text-center">
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
                                    </div>
                                </form>

                                <div class="text-center mt-5">
                                    <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                                            class="fw-semibold text-secondary text-decoration-underline"> SignUp</a>
                                    </p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
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
            </div>
        </div>
    </section>
@endsection

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
