@extends('auth.layouts.auth')

@section('auth')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100"
                class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="" onsubmit="btnSubmit.disabled=true; return true;">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" tabindex="1" required autofocus placeholder="Ex: budi@laravel.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            {{-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> --}}
                        </div>
                        <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" tabindex="2" required placeholder="Enter Passsword">
                        <span class="input-group-text">
                            <a href="javascript:;" id="togglePassword"><i class="fas fa-lock text-4 text-dark"></i></a>
                        </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <div class="text-muted mt-5 text-center">
            Don't have an account? <a href="{{ route('register') }}">Create One</a>
        </div>
        <div class="simple-footer">
            Copyright &copy; Laravel Indonesia 2024 - {{ date('Y') }}
        </div>
    </div>
@endsection
