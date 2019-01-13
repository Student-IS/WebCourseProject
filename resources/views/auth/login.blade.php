@extends('layouts.app')

@section('content')
    <h3>@lang('auth.login')</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label text-right">@lang('auth.email')</label>
            <div class="col-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="address@example.org" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-4 col-form-label text-right">@lang('auth.password')</label>
            <div class="col-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div> {{--
        <div class="form-group row">
            <div class="col-6 offset-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        @lang('auth.remember')
                    </label>
                </div>
            </div>
        </div> --}}
        <div class="form-group row mb-0">
            <div class="col-8 offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('auth.login')
                </button>
                {{--
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        @lang('auth.forgotPwd')
                    </a>
                @endif
                --}}
            </div>
        </div>
    </form>
@endsection
