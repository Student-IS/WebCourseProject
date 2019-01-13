@extends('layouts.app')

@section('content')
    <h3>@lang('auth.resetPwd')</h3>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label text-right">@lang('auth.email')</label>
            <div class="col-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="address@example.org" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-6 offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('auth.sendPwdResetLink')
                </button>
            </div>
        </div>
    </form>
@endsection
