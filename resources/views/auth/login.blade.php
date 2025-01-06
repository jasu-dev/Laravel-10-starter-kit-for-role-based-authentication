@extends('auth.layouts.app')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-6 col-xl-4 mx-auto">
                <div class="card">
                    <div class="auth-form-wrapper px-4 py-5">
                        <a href="#" class="noble-ui-logo d-block mb-2">GMJ <span>StarterKit</span></a>
                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                        @if (Session::has('danger'))
                            <div class="alert alert-fill-danger">
                                {{ Session::get('danger') }}
                            </div>
                        @endif
                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required autocomplete="current-password"
                                    placeholder="Password">
                                @if (Route::has('password.request'))
                                    <a class="d-block mt-3 text-muted text-end" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                @error('password')
                                    <span class="invalid-feedback d-block mt-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-block w-100 btn-primary btn-icon-text mb-2 mb-md-0">
                                    <i class="btn-icon-prepend" data-feather="lock"></i>
                                    Login Now
                                </button>
                            </div>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="d-block mt-3 text-center text-muted">Don't have an
                                    account?
                                    Register Now</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
