@extends('backend.layouts.app')

@section('content')
    <div class="card o-hidden border-0 shadow my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h2 class="h4 text-gray-900 mb-4">Welcome Back!</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="form-group">
                                <input type="email"
                                       class="form-control form-control-user @error('email') is-invalid @enderror"
                                       id="exampleInputEmail"
                                       aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                       id="exampleInputPassword"
                                       placeholder="Password" name="password"
                                       required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            @if (Route::has('register'))
                                <a class="small" href="{{ route('register') }}">{{ __('Register Account?') }}</a>
                            @endif
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
