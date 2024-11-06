@extends('auth.layouts.auth')

@section('auth')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
            <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="100"
                class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Register</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="Ex: Budi" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Ex: budi@laravel.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control pwstrength @error('password') is-invalid @enderror"
                                    data-indicator="pwindicator" name="password" placeholder="Enter Password" required autocomplete="new-password">
                                <span class="input-group-text">
                                    <a href="javascript:;" id="togglePassword"><i
                                            class="fas fa-lock text-4 text-dark"></i></a>
                                </span>
                            </div>
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="password2" class="d-block">Password Confirmation</label>
                            <div class="input-group">
                                <input id="passwordConfirm" type="password" class="form-control" name="password-confirm"
                                    placeholder="Enter Password" required autocomplete="new-password">
                                <span class="input-group-text">
                                    <a href="javascript:;" id="togglePasswordConfirm"><i
                                            class="fas fa-lock text-4 text-dark"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-muted mt-5 text-center">
            Do you have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>
        <div class="simple-footer">
            Copyright &copy; Laravel Indonesia 2024 - {{ date('Y') }}
        </div>
    </div>
@endsection
